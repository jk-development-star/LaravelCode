<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use DB;
use Auth;

class ListingCategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function index() {
        $listing_category = ListingCategory::orderBy('id', 'asc')->get();
        return view('admin.listing_category_view', compact('listing_category'));
    }

    public function create() {
        $listing_category = ListingCategory::get();
        return view('admin.listing_category_create', compact('listing_category'));
    }

    public function store(Request $request) {
        $request->validate([
            'listing_category_name' => 'required|unique:listing_categories',
            'listing_category_slug' => 'unique:listing_categories',
            'listing_category_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'listing_category_name.required' => ERR_NAME_REQUIRED,
            'listing_category_name.unique' => ERR_NAME_EXIST,
            'listing_category_slug.unique' => ERR_SLUG_UNIQUE,
            'listing_category_photo.required' => ERR_PHOTO_REQUIRED,
            'listing_category_photo.image' => ERR_PHOTO_IMAGE,
            'listing_category_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
            'listing_category_photo.max' => ERR_PHOTO_MAX
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'listing_categories'");
        $ai_id = $statement[0]->Auto_increment;

        $ext = $request->file('listing_category_photo')->extension();
        $rand_value = md5(mt_rand(11111111,99999999));
        $final_name = $rand_value.'.'.$ext;
        $request->file('listing_category_photo')->move(public_path('uploads/listing_category_photos/'), $final_name);

        $listing_category = new ListingCategory();
        $data = $request->only($listing_category->getFillable());
        if(empty($data['listing_category_slug'])) {
            unset($data['listing_category_slug']);
            $data['listing_category_slug'] = Str::slug($request->listing_category_name);
        }

        if(preg_match('/\s/',$data['listing_category_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }

        unset($data['listing_category_photo']);
        $data['listing_category_photo'] = $final_name;
        
        $listing_category->fill($data)->save();

        return redirect()->route('admin_listing_category_view')->with('success', SUCCESS_ACTION);
    }

    public function edit($id) {
        $listing_category = ListingCategory::findOrFail($id);
        return view('admin.listing_category_edit', compact('listing_category'));
    }

    public function update(Request $request, $id) {
        $listing_category = ListingCategory::findOrFail($id);
        $data = $request->only($listing_category->getFillable());

        if ($request->hasFile('listing_category_photo')) {

            $request->validate([
                'listing_category_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'listing_category_photo.image' => ERR_PHOTO_IMAGE,
                'listing_category_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'listing_category_photo.max' => ERR_PHOTO_MAX
            ]);

            unlink(public_path('uploads/listing_category_photos/'.$listing_category->listing_category_photo));

            // Uploading the file
            $ext = $request->file('listing_category_photo')->extension();
            $rand_value = md5(mt_rand(11111111,99999999));
            $final_name = $rand_value.'.'.$ext;
            $request->file('listing_category_photo')->move(public_path('uploads/listing_category_photos/'), $final_name);

            unset($data['listing_category_photo']);
            $data['listing_category_photo'] = $final_name;
        }

        $request->validate([
            'listing_category_name'   =>  [
                'required',
                Rule::unique('listing_categories')->ignore($id),
            ],
            'listing_category_slug'   =>  [
                Rule::unique('listing_categories')->ignore($id),
            ]
        ],[
            'listing_category_name.required' => ERR_NAME_REQUIRED,
            'listing_category_name.unique' => ERR_NAME_EXIST,
            'listing_category_slug.unique' => ERR_SLUG_UNIQUE,
        ]);

        if(empty($data['listing_category_slug']))
        {
            unset($data['listing_category_slug']);
            $data['listing_category_slug'] = Str::slug($request->listing_category_name);
        }

        if(preg_match('/\s/',$data['listing_category_slug']))
        {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }

        $listing_category->fill($data)->save();

        return redirect()->route('admin_listing_category_view')->with('success', SUCCESS_ACTION);
    }

    public function destroy($id)
    {
        $tot = Listing::where('listing_category_id',$id)->count();
        if($tot) {
            return Redirect()->back()->with('error', ERR_ITEM_DELETE);   
        }

        $listing_category = ListingCategory::findOrFail($id);
        unlink(public_path('uploads/listing_category_photos/'.$listing_category->listing_category_photo));
        $listing_category->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }

}
