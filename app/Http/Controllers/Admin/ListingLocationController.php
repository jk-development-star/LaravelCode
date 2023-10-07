<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use DB;
use Auth;

class ListingLocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $listing_location = ListingLocation::orderBy('id', 'asc')->get();
        return view('admin.listing_location_view', compact('listing_location'));
    }

    public function create()
    {
        $listing_location = ListingLocation::get();
        return view('admin.listing_location_create', compact('listing_location'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'listing_location_name' => 'required|unique:listing_locations',
            'listing_location_slug' => 'unique:listing_locations',
            'listing_location_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'listing_location_name.required' => ERR_NAME_REQUIRED,
            'listing_location_name.unique' => ERR_NAME_EXIST,
            'listing_location_slug.unique' => ERR_SLUG_UNIQUE,
            'listing_location_photo.required' => ERR_PHOTO_REQUIRED,
            'listing_location_photo.image' => ERR_PHOTO_IMAGE,
            'listing_location_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
            'listing_location_photo.max' => ERR_PHOTO_MAX
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'listing_locations'");
        $ai_id = $statement[0]->Auto_increment;

        $ext = $request->file('listing_location_photo')->extension();
        $rand_value = md5(mt_rand(11111111,99999999));
        $final_name = $rand_value.'.'.$ext;
        $request->file('listing_location_photo')->move(public_path('uploads/listing_location_photos/'), $final_name);

        $listing_location = new ListingLocation();
        $data = $request->only($listing_location->getFillable());
        if(empty($data['listing_location_slug']))
        {
            unset($data['listing_location_slug']);
            $data['listing_location_slug'] = Str::slug($request->listing_location_name);
        }

        if(preg_match('/\s/',$data['listing_location_slug']))
        {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }

        unset($data['listing_location_photo']);
        $data['listing_location_photo'] = $final_name;
       
        $listing_location->fill($data)->save();

        return redirect()->route('admin_listing_location_view')->with('success', SUCCESS_ACTION);
    }

    public function edit($id)
    {
        $listing_location = ListingLocation::findOrFail($id);
        return view('admin.listing_location_edit', compact('listing_location'));
    }

    public function update(Request $request, $id)
    {
        $listing_location = ListingLocation::findOrFail($id);
        $data = $request->only($listing_location->getFillable());

        if ($request->hasFile('listing_location_photo')) {

            $request->validate([
                'listing_location_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'listing_location_photo.image' => ERR_PHOTO_IMAGE,
                'listing_location_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'listing_location_photo.max' => ERR_PHOTO_MAX
            ]);

            unlink(public_path('uploads/listing_location_photos/'.$listing_location->listing_location_photo));

            // Uploading the file
            $ext = $request->file('listing_location_photo')->extension();
            $rand_value = md5(mt_rand(11111111,99999999));
            $final_name = $rand_value.'.'.$ext;
            $request->file('listing_location_photo')->move(public_path('uploads/listing_location_photos/'), $final_name);

            unset($data['listing_location_photo']);
            $data['listing_location_photo'] = $final_name;
        }

        $request->validate([
            'listing_location_name'   =>  [
                'required',
                Rule::unique('listing_locations')->ignore($id),
            ],
            'listing_location_slug'   =>  [
                Rule::unique('listing_locations')->ignore($id),
            ]
        ],[
            'listing_location_name.required' => ERR_NAME_REQUIRED,
            'listing_location_name.unique' => ERR_NAME_EXIST,
            'listing_location_slug.unique' => ERR_SLUG_UNIQUE,
        ]);

        if(empty($data['listing_location_slug']))
        {
            unset($data['listing_location_slug']);
            $data['listing_location_slug'] = Str::slug($request->listing_location_name);
        }

        if(preg_match('/\s/',$data['listing_location_slug']))
        {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }

        $listing_location->fill($data)->save();

        return redirect()->route('admin_listing_location_view')->with('success', SUCCESS_ACTION);
    }

    public function destroy($id)
    {
        $tot = Listing::where('listing_location_id',$id)->count();
        if($tot)
        {
            return Redirect()->back()->with('error', ERR_ITEM_DELETE);   
        }

        $listing_location = ListingLocation::findOrFail($id);
        unlink(public_path('uploads/listing_location_photos/'.$listing_location->listing_location_photo));
        $listing_location->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }

}
