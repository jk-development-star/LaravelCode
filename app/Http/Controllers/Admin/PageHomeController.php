<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PageHomeItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class PageHomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function edit() {
        $page_home = PageHomeItem::where('id',1)->first();
        return view('admin.page_home', compact('page_home'));
    }

    public function update(Request $request) {
        if($request->search_background != '') {
            $request->validate([
                'search_background' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'search_background.image' => ERR_PHOTO_IMAGE,
                'search_background.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'search_background.max' => ERR_PHOTO_MAX
            ]);
            unlink(public_path('uploads/site_photos/'.$request->current_photo));
            $rand_value = md5(mt_rand(11111111,99999999));
            $ext = $request->file('search_background')->extension();
            $final_name = $rand_value.'.'.$ext;
            $request->file('search_background')->move(public_path('uploads/site_photos/'), $final_name);
            $data['search_background'] = $final_name;
        }
        $data['seo_title'] = $request->input('seo_title');
        $data['seo_meta_description'] = $request->input('seo_meta_description');
        $data['search_heading'] = $request->input('search_heading');
        $data['search_text'] = $request->input('search_text');
        $data['category_heading'] = $request->input('category_heading');
        $data['category_subheading'] = $request->input('category_subheading');
        $data['category_total'] = $request->input('category_total');
        $data['category_status'] = $request->input('category_status');
        $data['listing_heading'] = $request->input('listing_heading');
        $data['listing_subheading'] = $request->input('listing_subheading');
        $data['listing_status'] = $request->input('listing_status');
        $data['location_heading'] = $request->input('location_heading');
        $data['location_subheading'] = $request->input('location_subheading');
        $data['location_total'] = $request->input('location_total');
        $data['location_status'] = $request->input('location_status');
        PageHomeItem::where('id',1)->update($data);
        return redirect()->back()->with('success', SUCCESS_ACTION);
    }

}
