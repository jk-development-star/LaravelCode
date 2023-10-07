<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\LanguageMenuText;
use App\Models\LanguageWebsiteText;
use App\Models\LanguageNotificationText;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Amenity;
use App\Models\Listing;
use App\Models\ListingCategory;
use App\Models\ListingLocation;
use App\Models\ListingSocialItem;
use App\Models\ListingAdditionalFeature;
use App\Models\ListingPhoto;
use App\Models\ListingVideo;
use App\Models\ListingAmenity;
use App\Models\Package;
use App\Models\PackagePurchase;
use App\Models\Review;
use App\Models\GeneralSetting;
use App\Models\EmailTemplate;
use App\Mail\PurchaseCompletedEmailToCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Hash;
use Auth;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;


class CustomerController extends Controller
{
	public function __construct() {
    	$this->middleware('auth:web');
    }

    public function dashboard() {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $total_active_listing =
            Listing::where('listing_status', 'Active')
            ->where('user_id', Auth::user()->id)
            ->count();

        $total_pending_listing =
            Listing::where('listing_status', 'Pending')
            ->where('user_id', Auth::user()->id)
            ->count();

        $detail = PackagePurchase::with('rPackage')
            ->where('user_id', Auth::user()->id)
            ->where('currently_active', 1)
            ->first();

        return view('front.customer_dashboard', compact('g_setting','total_active_listing','total_pending_listing','detail'));
    }

    public function update_profile() {
        $user_data = Auth::user();
        $g_setting = GeneralSetting::where('id', 1)->first();
        return view('front.customer_update_profile', compact('user_data','g_setting'));
    }

    public function update_profile_confirm(Request $request) {
        $user_data = Auth::user();
        $obj = User::findOrFail($user_data->id);
        $data = $request->only($obj->getFillable());
        $obj->fill($data)->save();
        return redirect()->back()->with('success', SUCCESS_PROFILE_UPDATE);
    }

    public function update_password() {
        $g_setting = GeneralSetting::where('id', 1)->first();
        return view('front.customer_update_password', compact('g_setting'));
    }

    public function update_password_confirm(Request $request) {
        $user_data = Auth::user();
        $obj = User::findOrFail($user_data->id);
        $data = $request->only($obj->getFillable());
        $request->validate([
            'password' => 'required',
            're_password' => 'required|same:password',
        ], [
            'password.required' => ERR_PASSWORD_REQUIRED,
            're_password.required' => ERR_RE_PASSWORD_REQUIRED,
            're_password.same' => ERR_RE_PASSWORD_REQUIRED
        ]);
        $data['password'] = Hash::make($request->password);
        unset($data['re_password']);
        $obj->fill($data)->save();
        return redirect()->back()->with('success', SUCCESS_PASSWORD_UPDATE);
    }

    public function update_photo() {
        $user_data = Auth::user();
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        return view('front.customer_update_photo', compact('user_data','g_setting'));
    }

    public function update_photo_confirm(Request $request) {
        $user_data = Auth::user();
        $obj = User::findOrFail($user_data->id);
        $data = $request->only($obj->getFillable());
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'photo.required' => ERR_PHOTO_REQUIRED,
            'photo.image' => ERR_PHOTO_IMAGE,
            'photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
            'photo.max' => ERR_PHOTO_MAX
        ]);
        if($user_data->photo != '') {
            unlink(public_path('uploads/user_photos/'.$user_data->photo));
        }
        $ext = $request->file('photo')->extension();
        $rand_value = md5(mt_rand(11111111,99999999));
        $final_name = $rand_value.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/user_photos/'), $final_name);
        $data['photo'] = $final_name;
        $obj->fill($data)->save();
        return redirect()->back()->with('success', SUCCESS_PHOTO_UPDATE);
    }

    public function update_banner() {
        $user_data = Auth::user();
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        return view('front.customer_update_banner', compact('user_data','g_setting'));
    }

    public function update_banner_confirm(Request $request) {
        $user_data = Auth::user();
        $obj = User::findOrFail($user_data->id);
        $data = $request->only($obj->getFillable());
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ],[
            'banner.required' => ERR_PHOTO_REQUIRED,
            'banner.image' => ERR_PHOTO_IMAGE,
            'banner.mimes' => ERR_PHOTO_JPG_PNG_GIF,
            'banner.max' => ERR_PHOTO_MAX
        ]);
        if($user_data->banner != '') {
            unlink(public_path('uploads/user_photos/'.$user_data->banner));
        }
        $ext = $request->file('banner')->extension();
        $rand_value = md5(mt_rand(11111111,99999999));
        $final_name = $rand_value.'.'.$ext;
        $request->file('banner')->move(public_path('uploads/user_photos/'), $final_name);
        $data['banner'] = $final_name;
        $obj->fill($data)->save();
        return redirect()->back()->with('success', SUCCESS_BANNER_UPDATE);
    }


    public function listing_view() {
        $user_data = Auth::user();
        $g_setting = GeneralSetting::where('id', 1)->first();
        $listing = Listing::with('rListingCategory', 'rListingLocation')
            ->where('user_id',$user_data->id)
            ->get();
        return view('front.customer_listing_view', compact('g_setting','listing'));
    }

    public function listing_view_detail($id) {

        $user_data = Auth::user();
        $check_other = Listing::where('id', $id)->first();

        if( (!$check_other) || ($check_other->user_id != $user_data->id)) {
            abort(404);
        }

        $g_setting = GeneralSetting::where('id', 1)->first();

        $listing = Listing::where('id', $id)->first();
        $listing_category = ListingCategory::orderBy('id','asc')->get();
        $listing_location = ListingLocation::orderBy('id','asc')->get();
        $amenity = Amenity::orderBy('id','asc')->get();

        $existing_amenities_array = array();
        $listing_amenities = ListingAmenity::where('listing_id',$id)->orderBy('id','asc')->get();
        foreach($listing_amenities as $row) {
            $existing_amenities_array[] = $row->amenity_id;
        }

        $listing_photos = ListingPhoto::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_videos = ListingVideo::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_additional_features = ListingAdditionalFeature::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_social_items = ListingSocialItem::where('listing_id',$id)->orderBy('id','asc')->get();

        $detail = PackagePurchase::with('rPackage')
            ->where('user_id', $user_data->id)
            ->where('currently_active', 1)
            ->first();

        $total_amenities = $detail->rPackage->total_amenities;
        $total_photos = $detail->rPackage->total_photos;
        $total_videos = $detail->rPackage->total_videos;
        $total_social_items = $detail->rPackage->total_social_items;
        $total_additional_features = $detail->rPackage->total_additional_features;

        return view('front.customer_listing_view_detail', compact('g_setting','listing','listing_category','listing_location','amenity','listing_photos','listing_videos','listing_additional_features','listing_social_items','listing_amenities','existing_amenities_array','total_amenities','total_photos','total_videos','total_social_items','total_additional_features'));
    }


    public function listing_add() {

        $user_data = Auth::user();

        // Check if he has access to add listing
        $listing_error_message = '';
        $detail = PackagePurchase::with('rPackage')
            ->where('user_id', $user_data->id)
            ->where('currently_active', 1)
            ->first();

        $total_listing_added_by_customer =
            Listing::where('user_id', $user_data->id)
            ->count();

        $total_amenities = 0;
        $total_photos = 0;
        $total_videos = 0;
        $total_social_items = 0;
        $total_additional_features = 0;
        $allow_featured = 0;

        if($detail == null) {
            $listing_error_message = ERR_ENROLL_PACKAGE_FIRST;
        } else {
            // Date Over Check
            $today = date('Y-m-d');
            $expire_date = $detail->package_end_date;
            if($today > $expire_date) {
                $listing_error_message = ERR_LISTING_DATE_EXPIRED;
            }

            // Maximum Quota Check
            $remaining_listing = $detail->total_listings-$total_listing_added_by_customer;
            if($remaining_listing == 0) {
                $listing_error_message = MAXIMUM_LIMIT_REACHED;
            }

            $total_amenities = $detail->rPackage->total_amenities;
            $total_photos = $detail->rPackage->total_photos;
            $total_videos = $detail->rPackage->total_videos;
            $total_social_items = $detail->rPackage->total_social_items;
            $total_additional_features = $detail->rPackage->total_additional_features;
            $allow_featured = $detail->rPackage->allow_featured;
        }

        $g_setting = GeneralSetting::where('id', 1)->first();
        $listing = Listing::get();
        $listing_category = ListingCategory::orderBy('id','asc')->get();
        $listing_location = ListingLocation::orderBy('id','asc')->get();
        $amenity = Amenity::orderBy('id','asc')->get();
        return view('front.customer_listing_add', compact('g_setting','listing','listing_category','listing_location','amenity', 'listing_error_message','total_amenities','total_photos','total_videos','total_social_items','total_additional_features','allow_featured'));
    }

    public function listing_add_store(Request $request) {

        $user_data = Auth::user();
        $request->validate([
            'listing_name' => 'required|unique:listings',
            'listing_slug' => 'unique:listings',
            'listing_description' => 'required',
            'listing_phone' => 'required|unique:listings',
            'listing_email' => 'required|unique:listings',
            'listing_featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'listing_name.required' => ERR_NAME_REQUIRED,
            'listing_name.unique' => ERR_NAME_EXIST,
            'listing_slug.unique' => ERR_SLUG_UNIQUE,
            'listing_description.required' => ERR_DESCRIPTION_REQUIRED,
            'listing_phone.required' => ERR_PHONE_REQURED,
            'listing_phone.unique' => ERR_PHONE_UNIQUE,
            'listing_email.required' => ERR_EMAIL_REQUIRED,
            'listing_email.unique' => ERR_EMAIL_EXIST,
            'listing_featured_photo.required' => ERR_PHOTO_REQUIRED,
            'listing_featured_photo.image' => ERR_PHOTO_IMAGE,
            'listing_featured_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
            'listing_featured_photo.max' => ERR_PHOTO_MAX
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'listings'");
        $ai_id = $statement[0]->Auto_increment;

        $rand_value = md5(mt_rand(11111111,99999999));
        $ext = $request->file('listing_featured_photo')->extension();
        $final_name = $rand_value.'.'.$ext;
        $request->file('listing_featured_photo')->move(public_path('uploads/listing_featured_photos'), $final_name);

        $listing = new Listing();
        $data = $request->only($listing->getFillable());
        if(empty($data['listing_slug'])) {
            unset($data['listing_slug']);
            $data['listing_slug'] = Str::slug($request->listing_name);
        }
        if(preg_match('/\s/',$data['listing_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }
        $data['listing_featured_photo'] = $final_name;
        $data['user_id'] = $user_data->id;
        $data['admin_id'] = 0;
        $data['listing_status'] = 'Pending';
        if($request->is_featured == null) {
            $data['is_featured'] = 'No';
        } else {
            $data['is_featured'] = $request->is_featured;
        }
        $listing->fill($data)->save();

        // Amenity
        if($request->amenity != '') {
            $arr_amenity = array();
            foreach($request->amenity as $item) {
                $arr_amenity[] = $item;
            }
            for($i=0;$i<count($arr_amenity);$i++) {
                $obj = new ListingAmenity;
                $obj->listing_id = $ai_id;
                $obj->amenity_id = $arr_amenity[$i];
                $obj->save();
            }
        }

        // Photo
        if($request->photo_list == '') {
//            echo 'No photo selected';
        } else {
            foreach($request->photo_list as $item) {
                $file_in_mb = $item->getSize()/1024/1024;
                $main_file_ext = $item->extension();
                $main_mime_type = $item->getMimeType();
                if( ($main_mime_type == 'image/jpeg' || $main_mime_type == 'image/png' || $main_mime_type == 'image/gif') && $file_in_mb <= 2 ) {
                    $rand_value = md5(mt_rand(11111111,99999999));
                    $final_photo_name = $rand_value.'.'.$main_file_ext;
                    $item->move(public_path('uploads/listing_photos'), $final_photo_name);

                    $obj = new ListingPhoto;
                    $obj->listing_id = $ai_id;
                    $obj->photo = $final_photo_name;
                    $obj->save();
                }
            }
        }


        // Video
        if($request->youtube_video_id[0] != '') {
            $arr_youtube_video_id = array();
            foreach($request->youtube_video_id as $item) {
                $arr_youtube_video_id[] = $item;
            }
            for($i=0;$i<count($arr_youtube_video_id);$i++) {
                if($arr_youtube_video_id[$i] != '') {
                    $obj = new ListingVideo;
                    $obj->listing_id = $ai_id;
                    $obj->youtube_video_id = $arr_youtube_video_id[$i];
                    $obj->save();
                }
            }
        }


        // Social Icons
        if($request->social_icon[0] != '') {
            $arr_social_icon = array();
            $arr_social_url = array();
            foreach($request->social_icon as $item) {
                $arr_social_icon[] = $item;
            }
            foreach($request->social_url as $item) {
                $arr_social_url[] = $item;
            }
            for($i=0;$i<count($arr_social_icon);$i++) {
                if( ($arr_social_icon[$i] != '') && ($arr_social_url[$i] != '') ) {
                    $obj = new ListingSocialItem;
                    $obj->listing_id = $ai_id;
                    $obj->social_icon = $arr_social_icon[$i];
                    $obj->social_url = $arr_social_url[$i];
                    $obj->save();
                }
            }
        }


        // Additional Features
        if($request->additional_feature_name[0] != '') {
            $arr_additional_feature_name = array();
            $arr_additional_feature_value = array();
            foreach($request->additional_feature_name as $item) {
                $arr_additional_feature_name[] = $item;
            }
            foreach($request->additional_feature_value as $item) {
                $arr_additional_feature_value[] = $item;
            }
            for($i=0;$i<count($arr_additional_feature_name);$i++) {
                if( ($arr_additional_feature_name[$i] != '') && ($arr_additional_feature_value[$i] != '') ) {
                    $obj = new ListingAdditionalFeature;
                    $obj->listing_id = $ai_id;
                    $obj->additional_feature_name = $arr_additional_feature_name[$i];
                    $obj->additional_feature_value = $arr_additional_feature_value[$i];
                    $obj->save();
                }
            }
        }
        return redirect()->route('customer_listing_view')->with('success', SUCCESS_LISTING_ADD);
    }

    public function listing_edit($id) {

        $user_data = Auth::user();
        $check_other = Listing::where('id', $id)->first();

        if( (!$check_other) || ($check_other->user_id != $user_data->id)) {
            abort(404);
        }

        $g_setting = GeneralSetting::where('id', 1)->first();

        $listing = Listing::where('id', $id)->first();
        $listing_category = ListingCategory::orderBy('id','asc')->get();
        $listing_location = ListingLocation::orderBy('id','asc')->get();
        $amenity = Amenity::orderBy('id','asc')->get();

        $existing_amenities_array = array();
        $listing_amenities = ListingAmenity::where('listing_id',$id)->orderBy('id','asc')->get();
        foreach($listing_amenities as $row) {
            $existing_amenities_array[] = $row->amenity_id;
        }

        $listing_photos = ListingPhoto::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_videos = ListingVideo::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_additional_features = ListingAdditionalFeature::where('listing_id',$id)->orderBy('id','asc')->get();
        $listing_social_items = ListingSocialItem::where('listing_id',$id)->orderBy('id','asc')->get();

        $detail = PackagePurchase::with('rPackage')
            ->where('user_id', $user_data->id)
            ->where('currently_active', 1)
            ->first();

        $total_amenities = $detail->rPackage->total_amenities;
        $total_photos = $detail->rPackage->total_photos;
        $total_videos = $detail->rPackage->total_videos;
        $total_social_items = $detail->rPackage->total_social_items;
        $total_additional_features = $detail->rPackage->total_additional_features;
        $allow_featured = $detail->rPackage->allow_featured;

        return view('front.customer_listing_edit', compact('g_setting','listing','listing_category','listing_location','amenity','listing_photos','listing_videos','listing_additional_features','listing_social_items','listing_amenities','existing_amenities_array','total_amenities','total_photos','total_videos','total_social_items','total_additional_features','allow_featured'));
    }

    public function listing_update(Request $request, $id) {

        $user_data = Auth::user();
        $listing = Listing::findOrFail($id);
        $data = $request->only($listing->getFillable());

        if ($request->hasFile('listing_featured_photo')) {

            $request->validate([
                'listing_featured_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'listing_featured_photo.image' => ERR_PHOTO_IMAGE,
                'listing_featured_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'listing_featured_photo.max' => ERR_PHOTO_MAX
            ]);

            unlink(public_path('uploads/listing_featured_photos/'.$listing->listing_featured_photo));

            // Uploading the file
            $ext = $request->file('listing_featured_photo')->extension();
            $rand_value = md5(mt_rand(11111111,99999999));
            $final_name = $rand_value.'.'.$ext;
            $request->file('listing_featured_photo')->move(public_path('uploads/listing_featured_photos/'), $final_name);

            unset($data['listing_featured_photo']);
            $data['listing_featured_photo'] = $final_name;
        }

        $request->validate([
            'listing_name'   =>  [
                'required',
                Rule::unique('listings')->ignore($id),
            ],
            'listing_slug'   =>  [
                Rule::unique('listings')->ignore($id),
            ],
            'listing_description' => 'required',
            'listing_phone'   =>  [
                'required',
                Rule::unique('listings')->ignore($id),
            ],
            'listing_email'   =>  [
                'required',
                Rule::unique('listings')->ignore($id),
            ],
        ],[
            'listing_name.required' => ERR_NAME_REQUIRED,
            'listing_name.unique' => ERR_NAME_EXIST,
            'listing_slug.unique' => ERR_SLUG_UNIQUE,
            'listing_description.required' => ERR_DESCRIPTION_REQUIRED,
            'listing_phone.required' => ERR_PHONE_REQUIRED,
            'listing_phone.unique' => ERR_PHONE_UNIQUE,
            'listing_email.required' => ERR_EMAIL_REQUIRED,
            'listing_email.unique' => ERR_EMAIL_EXIST
        ]);
        if(empty($data['listing_slug'])) {
            unset($data['listing_slug']);
            $data['listing_slug'] = Str::slug($request->listing_name);
        }
        if(preg_match('/\s/',$data['listing_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }
        $listing->fill($data)->save();


        // Amenity
        $existing_amenities_array = array();
        $arr_amenity = array();
        $result1 = array();
        $result2 = array();

        $listing_amenities = ListingAmenity::where('listing_id',$id)->orderBy('id','asc')->get();
        foreach($listing_amenities as $row) {
            $existing_amenities_array[] = $row->amenity_id;
        }

        if($request->amenity != '') {
            foreach($request->amenity as $item) {
                $arr_amenity[] = $item;
            }
        }

        $result1 = array_values(array_diff($existing_amenities_array, $arr_amenity));
        if(!empty($result1)) {
            for($i=0;$i<count($result1);$i++) {
                ListingAmenity::where('listing_id', $id)
                    ->where('amenity_id', $result1[$i])
                    ->delete();
            }
        }

        $result2 = array_values(array_diff($arr_amenity,$existing_amenities_array));
        if(!empty($result2)) {
            for($i=0;$i<count($result2);$i++) {
                $obj = new ListingAmenity;
                $obj->listing_id = $id;
                $obj->amenity_id = $result2[$i];
                $obj->save();
            }
        }


        // Photo
        if($request->photo_list == '') {
            //echo 'No photo selected';
        } else {
            foreach($request->photo_list as $item) {
                $file_in_mb = $item->getSize()/1024/1024;
                $main_file_ext = $item->extension();
                $main_mime_type = $item->getMimeType();

                if( ($main_mime_type == 'image/jpeg' || $main_mime_type == 'image/png' || $main_mime_type == 'image/gif') && $file_in_mb <= 2 ) {
                    $rand_value = md5(mt_rand(11111111,99999999));
                    $final_photo_name = $rand_value.'.'.$main_file_ext;
                    $item->move(public_path('uploads/listing_photos'), $final_photo_name);

                    $obj = new ListingPhoto;
                    $obj->listing_id = $id;
                    $obj->photo = $final_photo_name;
                    $obj->save();
                }
            }
        }


        // Video
        if($request->youtube_video_id[0] != '') {
            $arr_youtube_video_id = array();
            foreach($request->youtube_video_id as $item) {
                $arr_youtube_video_id[] = $item;
            }
            for($i=0;$i<count($arr_youtube_video_id);$i++) {
                if($arr_youtube_video_id[$i] != '') {
                    $obj = new ListingVideo;
                    $obj->listing_id = $id;
                    $obj->youtube_video_id = $arr_youtube_video_id[$i];
                    $obj->save();
                }
            }
        }


        // Social Icons
        if($request->social_icon[0] != '') {
            $arr_social_icon = array();
            $arr_social_url = array();
            foreach($request->social_icon as $item) {
                $arr_social_icon[] = $item;
            }
            foreach($request->social_url as $item) {
                $arr_social_url[] = $item;
            }
            for($i=0;$i<count($arr_social_icon);$i++) {
                if( ($arr_social_icon[$i] != '') && ($arr_social_url[$i] != '') ) {
                    $obj = new ListingSocialItem;
                    $obj->listing_id = $id;
                    $obj->social_icon = $arr_social_icon[$i];
                    $obj->social_url = $arr_social_url[$i];
                    $obj->save();
                }
            }
        }


        // Additional Features
        if($request->additional_feature_name[0] != '') {
            $arr_additional_feature_name = array();
            $arr_additional_feature_value = array();
            foreach($request->additional_feature_name as $item) {
                $arr_additional_feature_name[] = $item;
            }
            foreach($request->additional_feature_value as $item) {
                $arr_additional_feature_value[] = $item;
            }
            for($i=0;$i<count($arr_additional_feature_name);$i++) {
                if( ($arr_additional_feature_name[$i] != '') && ($arr_additional_feature_value[$i] != '') ) {
                    $obj = new ListingAdditionalFeature;
                    $obj->listing_id = $id;
                    $obj->additional_feature_name = $arr_additional_feature_name[$i];
                    $obj->additional_feature_value = $arr_additional_feature_value[$i];
                    $obj->save();
                }
            }
        }
        return redirect()->route('customer_listing_view')->with('success', SUCCESS_LISTING_EDIT);
    }

    public function listing_delete($id) {

        $listing = Listing::findOrFail($id);
        unlink(public_path('uploads/listing_featured_photos/'.$listing->listing_featured_photo));
        $listing->delete();

        ListingAmenity::where('listing_id', $id)->delete();
        ListingSocialItem::where('listing_id', $id)->delete();
        ListingVideo::where('listing_id', $id)->delete();
        ListingAdditionalFeature::where('listing_id', $id)->delete();

        $all_photos = ListingPhoto::where('listing_id',$id)->get();
        foreach($all_photos as $item) {
            unlink(public_path('uploads/listing_photos/'.$item->photo));
        }

        ListingPhoto::where('listing_id', $id)->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', SUCCESS_LISTING_DELETE);
    }


    public function listing_delete_social_item($id) {
        $listing_social_item = ListingSocialItem::findOrFail($id);
        $listing_social_item->delete();
        return Redirect()->back()->with('success', SUCCESS_SOCIAL_ITEM_DELETE);
    }

    public function listing_delete_photo($id) {
        $listing_photo = ListingPhoto::findOrFail($id);
        unlink(public_path('uploads/listing_photos/'.$listing_photo->photo));
        $listing_photo->delete();
        return Redirect()->back()->with('success', SUCCESS_PHOTO_DELETE);
    }

    public function listing_delete_video($id) {
        $listing_video = ListingVideo::findOrFail($id);
        $listing_video->delete();
        return Redirect()->back()->with('success', SUCCESS_VIDEO_DELETE);
    }

    public function listing_delete_additional_feature($id) {
        $listing_additional_feature = ListingAdditionalFeature::findOrFail($id);
        $listing_additional_feature->delete();
        return Redirect()->back()->with('success', SUCCESS_ADDITIONAL_FEATURE_DELETE);
    }

    public function submit_review(Request $request) {
        $user_data = Auth::user();
        $request->validate([
            'review' => 'required'
        ], [
            'review.required' => ERR_REVIEW_REQUIRED
        ]);

        // Logged in user. As this is front end, user must be a customer
        $review = new Review;
        $review->listing_id = $request->listing_id;
        $review->agent_id = $user_data->id;
        $review->agent_type = 'Customer';
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        return Redirect()->back()->with('success', SUCCESS_RATING_PLACED);
    }

    public function package() {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $package = Package::orderBy('package_order', 'asc')->get();
        return view('front.customer_package', compact('g_setting','package'));
    }

    public function free_enroll($id) {

        $user_data = Auth::user();

        // Make all other previous packages status to 0 and this package status 1
        $data['currently_active'] = 0;

        PackagePurchase::where('user_id',$user_data->id)->update($data);

        // Selected Package Detail
        $package_detail = Package::where('id',$id)->first();
        $valid_days = $package_detail->valid_days;
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime("+$valid_days days"));

        $obj = new PackagePurchase;
        $obj->user_id = $user_data->id;
        $obj->package_id = $id;
        $obj->transaction_id = '';
        $obj->paid_amount = 0;
        $obj->payment_method = '';
        $obj->payment_status = 'Completed';
        $obj->package_start_date = $start_date;
        $obj->package_end_date = $end_date;
        $obj->currently_active = 1;
        $obj->save();
        return Redirect()->route('customer_package_purchase_history')->with('success', SUCCESS_PACKAGE_ENROLL);
    }

    public function my_reviews() {
        $user_data = Auth::user();
        $g_setting = GeneralSetting::where('id', 1)->first();
        $reviews = Review::where('agent_id', $user_data->id)->where('agent_type', 'Customer')
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('front.customer_my_reviews', compact('g_setting','reviews'));
    }

    public function review_edit($id) {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $review_single = Review::findOrFail($id);
        return view('front.customer_my_review_edit', compact('review_single'));
    }

    public function review_update(Request $request, $id) {
        $review = Review::findOrFail($id);
        $data = $request->only($review->getFillable());
        $request->validate([
            'review' => 'required'
        ]);
        $review->fill($data)->save();
        return redirect()->route('customer_my_reviews')->with('success', SUCCESS_REVIEW_UPDATE);
    }

    public function review_delete($id) {
        $review = Review::findOrFail($id);
        $review->delete();
        return Redirect()->back()->with('success', SUCCESS_REVIEW_DELETE);
    }

    public function wishlist() {
        $user_data = Auth::user();
        $g_setting = GeneralSetting::where('id', 1)->first();
        $wishlist = Wishlist::where('user_id', $user_data->id)->orderBy('id', 'asc')->paginate(10);
        return view('front.customer_wishlist', compact('g_setting','wishlist'));
    }

    public function wishlist_delete($id) {
        $obj = Wishlist::findOrFail($id);
        $obj->delete();
        return Redirect()->back()->with('success', SUCCESS_ITEM_REMOVED_FROM_WISHLIST);
    }

    public function purchase_history() {
        $user_data = Auth::user();
        $g_setting = GeneralSetting::where('id', 1)->first();
        $package_purchase = PackagePurchase::with('rPackage')
            ->where('user_id', $user_data->id)
            ->orderBy('id', 'desc')
            ->get();
        return view('front.customer_package_purchase_history', compact('g_setting','package_purchase'));
    }

    public function purchase_history_detail($id)    {
        $user_data = Auth::user();
        $g_setting = GeneralSetting::where('id', 1)->first();
        $detail = PackagePurchase::with('rPackage')
            ->where('id', $id)
            ->first();
        if(!$detail) {
            abort(404);
        }
        return view('front.customer_package_purchase_history_detail', compact('g_setting','detail'));
    }

    public function invoice($id) {
        $user_data = Auth::user();
        $g_setting = GeneralSetting::where('id', 1)->first();
        $detail = PackagePurchase::with('rPackage')
            ->where('id', $id)
            ->first();

        if(!$detail) {
            abort(404);
        }
        return view('front.customer_package_purchase_invoice', compact('user_data','g_setting','detail'));
    }

    public function buy_package($id) {
        $g_setting = GeneralSetting::where('id',1)->first();
        $package_detail = Package::where('id',$id)->first();
        session()->put('package_id',$id);
        session()->put('package_name',$package_detail->package_name);
        session()->put('package_price',$package_detail->package_price);
        return view('front.customer_package_buy', compact('g_setting'));
    }

    public function paypal() {
        if(!session()->get('package_id')) {
            return redirect()->to('/');
        }

        $user_data = Auth::user();
        $g_setting = GeneralSetting::where('id',1)->first();
        $client = $g_setting->paypal_client_id;
        $secret = $g_setting->paypal_secret_key;

        $final_price = session()->get('package_price');
        $final_price = round($final_price,2);


        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $client, // ClientID
                $secret // ClientSecret
            )
        );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(0)
                ->setTax(0)
                ->setSubtotal($final_price);

        $amount->setCurrency('USD');
        $amount->setTotal($final_price);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        $result = $payment->execute($execution, $apiContext);


        if($result->state == 'approved')
        {
            $paid_amount = $result->transactions[0]->amount->total;

            // Make all other previous packages status to 0 and this package status 1
            $data['currently_active'] = 0;
            PackagePurchase::where('user_id',$user_data->id)->update($data);

            // Selected Package Detail
            $package_detail = Package::where('id',session()->get('package_id'))->first();
            $valid_days = $package_detail->valid_days;
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d', strtotime("+$valid_days days"));

            $obj = new PackagePurchase;
            $obj->user_id = $user_data->id;
            $obj->package_id = session()->get('package_id');
            $obj->transaction_id = $paymentId;
            $obj->paid_amount = $paid_amount;
            $obj->payment_method = 'PayPal';
            $obj->payment_status = 'Completed';
            $obj->package_start_date = $start_date;
            $obj->package_end_date = $end_date;
            $obj->currently_active = 1;
            $obj->save();


            // Send Email To Customer
            $payment_method = 'PayPal';
            $et_data = EmailTemplate::where('id', 8)->first();
            $subject = $et_data->et_subject;
            $message = $et_data->et_content;

            $message = str_replace('[[customer_name]]', $user_data->name, $message);
            $message = str_replace('[[transaction_id]]', $paymentId, $message);
            $message = str_replace('[[payment_method]]', $payment_method, $message);
            $message = str_replace('[[paid_amount]]', '$'.$paid_amount, $message);
            $message = str_replace('[[payment_status]]', 'Completed', $message);
            $message = str_replace('[[package_start_date]]', $start_date, $message);
            $message = str_replace('[[package_end_date]]', $end_date, $message);
            Mail::to($user_data->email)->send(new PurchaseCompletedEmailToCustomer($subject,$message));

            session()->forget('package_id');
            session()->forget('package_name');
            session()->forget('package_price');

            return Redirect()->route('customer_package_purchase_history')->with('success', SUCCESS_PACKAGE_PURCHASE);
        }
        else {
            return redirect()->to('/');
        }
    }



    public function stripe()
    {
        if(!session()->get('package_id')) {
            return redirect()->to('/');
        }

        $user_data = Auth::user();
        $g_setting = GeneralSetting::where('id', 1)->first();
        $stripe_secret_key = $g_setting->stripe_secret_key;

        $final_price = session()->get('package_price');
        $final_price = round($final_price,2);

        \Stripe\Stripe::setApiKey($stripe_secret_key);

        if(isset($_POST['stripeToken']))
        {
            \Stripe\Stripe::setVerifySslCerts(false);

            $token = $_POST['stripeToken'];
            $response = \Stripe\Charge::create([
                'amount' => $final_price*100,
                'currency' => 'usd',
                'description' => 'Stripe Payment',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);

            $bal = \Stripe\BalanceTransaction::retrieve($response->balance_transaction);
            $balJson = $bal->jsonSerialize();

            $paid_amount = $balJson['amount']/100;

            // Make all other previous packages status to 0 and this package status 1
            $data['currently_active'] = 0;
            PackagePurchase::where('user_id',$user_data->id)->update($data);

            // Selected Package Detail
            $package_detail = Package::where('id',session()->get('package_id'))->first();
            $valid_days = $package_detail->valid_days;
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d', strtotime("+$valid_days days"));


            $obj = new PackagePurchase;
            $obj->user_id = $user_data->id;
            $obj->package_id = session()->get('package_id');
            $obj->transaction_id = $response->balance_transaction;
            $obj->paid_amount = $paid_amount;
            $obj->payment_method = 'Stripe';
            $obj->payment_status = 'Completed';
            $obj->package_start_date = $start_date;
            $obj->package_end_date = $end_date;
            $obj->currently_active = 1;
            $obj->save();

            // Send Email To Customer
            $payment_method = 'Stripe';

            $et_data = EmailTemplate::where('id', 8)->first();
            $subject = $et_data->et_subject;
            $message = $et_data->et_content;

            $message = str_replace('[[customer_name]]', $user_data->name, $message);
            $message = str_replace('[[transaction_id]]', $response->balance_transaction, $message);
            $message = str_replace('[[payment_method]]', $payment_method, $message);
            $message = str_replace('[[paid_amount]]', '$'.$paid_amount, $message);
            $message = str_replace('[[payment_status]]', 'Completed', $message);
            $message = str_replace('[[package_start_date]]', $start_date, $message);
            $message = str_replace('[[package_end_date]]', $end_date, $message);
            Mail::to($user_data->email)->send(new PurchaseCompletedEmailToCustomer($subject,$message));

            session()->forget('package_id');
            session()->forget('package_name');
            session()->forget('package_price');
            return Redirect()->route('customer_package_purchase_history')->with('success', SUCCESS_PACKAGE_PURCHASE);
        }

    }
}
