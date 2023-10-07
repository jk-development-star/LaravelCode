<?php
namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Admin;
use App\Models\Listing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\knowledgecategory;
use App\Models\kb_subcats;
use App\Models\kb_topics;
use App\Models\slider_images;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function index() {
        $total_active_customers = User::where('status', 'Active')->count();
        $total_pending_customers = User::where('status', 'Pending')->count();
        $total_active_listings = Listing::where('listing_status', 'Active')->count();
        $total_pending_listings = Listing::where('listing_status', 'Pending')->count();
        
        return view('admin.home', compact('total_active_customers','total_pending_customers','total_active_listings','total_pending_listings'));
    }
    public function get_knowledge_cat() {
        $category = knowledgecategory::all();
        return view('admin.get_category',compact('category'));
    }
    public function add_knowledge_cat() {
        return view('admin.add_category');
    }
    public function store_knowledge_cat(Request $request) {
        $request->validate([
            'category_name' => 'required',
            'category_image' => 'nullable|mimes:jpeg,png,bmp,gif,tiff'
        ]);
        $category = new knowledgecategory();
        $category->category_name = $request->category_name;
        if($request->category_image != '')
        {
           //adding user_image file to folder
            $category_image = $request->file('category_image');
            $image_name="Knowledge Bank-".$category->category_name."'s-Featured Image-".md5(microtime()).'.'.$category_image->getClientOriginalExtension();
            $destinationPath = public_path('kb-images');
            $category_image->move($destinationPath, $image_name);
            $category->category_img = $image_name;
        }
        $category->save();
        return redirect()->back()->with('success', 'Category Saved Succesfuly!!');
    }
    public function kb_cat_edit(Request $request ) {
        $category = knowledgecategory::find($request->id);
        return view('admin.edit_category',compact('category'));
    }
    public function kb_cat_update(Request $request ) {
        $category = knowledgecategory::find( $request->category_id);
        $category->category_name = $request->category_name; 
        if($request->category_image != '')
        {
           //adding user_image file to folder
            $category_image = $request->file('category_image');
            $image_name="Knowledge Bank-".$category->category_name."'s-Featured Image-".md5(microtime()).'.'.$category_image->getClientOriginalExtension();
            $destinationPath = public_path('kb-images');
            $category_image->move($destinationPath, $image_name);
            $category->category_img = $image_name;
        }
        $category->save();
        return redirect()->back()->with('success','Knowldge Bank Category Suucessfuly Updated!');
    }
    public function kb_cat_delete(Request $request ) {
        $category = knowledgecategory::find($request->id);
        if($category->count() == 0){
            return redirect()->back()->with('error','Your request cannot fulfiled!');
        }else{
            $category->delete();
            return redirect()->back()->with('success','Category deleted successfuly!!');
        }
    }
    public function sub_cats(Request $request ) {
        $category = kb_subcats::all();
        return view('admin.kb_subcats',compact('category'));
    }
    public function add_sub_cats(Request $request ) {
        return view('admin.add_kb_subcats');
    }
    public function insert_sub_cats(Request $request){
        $cat = new kb_subcats();
        $cat->name = $request->category_name; 
        $cat->category_id = $request->cat_parent; 
        $cat->save();
        return redirect()->back()->with('success','Subcategory inserted successfuly!!'); 
    }
    public function delete_sub_cats(Request $request){
        $cat = kb_subcats::find($request->id)->delete();
        return redirect()->back()->with('error','Subcategory deleted successfuly!!'); 
    }
    public function edit_sub_cats(Request $request){
        $cat = kb_subcats::find($request->id);
        return view('admin.edit_subcat',compact('cat'));
    }
    public function update_sub_cats(Request $request){
        $cat = kb_subcats::find($request->subcat_id);
        $cat->name = $request->category_name;
        $cat->category_id = $request->cat_parent;
        $cat->save();
        return redirect()->back()->with('success','Subcategory updated successfuly!!'); 
    } 
    public function kb_topics(Request $request){
        $kb = kb_topics::all();
        return view('admin.kb-topics',compact('kb'));
    }
    public function add_kb_topics(Request $request){
        $cat  = kb_subcats::all();
        return view('admin.add_kb_topics',compact('cat'));
    }
    public function insert_kb_topics(Request $request){
        $request->validate([
            'post_title' => 'required',
            'post_photo' => 'required',
            'post_content' => 'required',
            'category_id' => 'required'
        ]);
        $topic = new kb_topics();
        $topic->title = $request->post_title;
        $topic->description = $request->post_content;
        $topic->cat_id = $request->category_id;

         $image = $request->file('post_photo');
            $image_name="Kb_topic-".md5(microtime()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('kb-images');
            $image->move($destinationPath, $image_name);
            $topic->featured_img = $image_name;
            $topic->save();

        return redirect()->back()->with('success','Knowledge Bank Inserted Succcessfuly!!');
    }
    public function delete_kb_topic (Request $request){
        $kb = kb_topics::find($request->id)->delete();
        return redirect()->back()->with('error','Knowledge Bank Topic Deleted Successfuly!');
    }
    public function edit_kb_topic (Request $request){
        $topic = kb_topics::find($request->id);
        $cat = kb_subcats::all();
        return view('admin.edit_kb_topic',compact('topic','cat'));
    }
    public function update_kb_topic(Request $request){
       $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'category_id' => 'required'
        ]);
        $topic = kb_topics::find($request->id);
        $topic->title = $request->post_title;
        $topic->description = $request->post_content;
        $topic->cat_id = $request->category_id;

        if ($request->post_photo!=''){
             $image = $request->file('post_photo');
            $image_name="Kb_topic-".md5(microtime()).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('kb-images');
            $image->move($destinationPath, $image_name);
            $topic->featured_img = $image_name;
        }
            $topic->save();
            return redirect()->back()->with('success','Data updated successfuly!!');
    }
    public function slider_settings(){
        $slider_images = slider_images::all();
        return view('admin.slider_settings',compact('slider_images'));
    }
    public function add_slider_image(){
        return view('admin.add_slider_image');
    }
    public function insert_slider_image(Request $request){
        $request->validate([
            'photo' => 'required',
            'caption' => 'required'
        ]);
        $image = new slider_images();
        $image->caption = $request->caption;
       
        $photo = $request->file('photo');
        $image_name="slider-image-".md5(microtime()).'.'.$photo->getClientOriginalExtension();
        $destinationPath = public_path('slider-images');
        $photo->move($destinationPath, $image_name);
        $image->name = $image_name;
        $image->save();
        return redirect()->back()->with('success','image inserted Successfuly!!');

    }
    public function delete_slider_image(Request $request){
        $image = slider_images::find($request->id)->delete();
        return redirect()->back()->with('error','Slider Image Deleted Successfuly!!');
    }
}