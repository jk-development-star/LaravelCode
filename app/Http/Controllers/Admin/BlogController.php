<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function index() {
        $blog = Blog::all();
        return view('admin.blog_view', compact('blog'));
    }

    public function create() {
        $category=DB::table('categories')->get();
        return view('admin.blog_create', compact('category'));
    }

    public function store(Request $request) {
        $request->validate([
            'post_title' => 'required|unique:blogs',
            'post_slug' => 'unique:blogs',
            'post_content' => 'required',
            'post_content_short' => 'required',
            'post_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'post_title.required' => ERR_NAME_REQUIRED,
            'post_title.unique' => ERR_NAME_EXIST,
            'post_slug.unique' => ERR_SLUG_UNIQUE,
            'post_content.required' => ERR_CONTENT_REQUIRED,
            'post_content_short.required' => ERR_CONTENT_SHORT_REQUIRED,
            'post_photo.required' => ERR_PHOTO_REQUIRED,
            'post_photo.image' => ERR_PHOTO_IMAGE,
            'post_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
            'post_photo.max' => ERR_PHOTO_MAX
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'blogs'");
        $ai_id = $statement[0]->Auto_increment;

        $rand_value = md5(mt_rand(11111111,99999999));
        $ext = $request->file('post_photo')->extension();
        $final_name = $rand_value.'.'.$ext;
        $request->file('post_photo')->move(public_path('uploads/post_photos/'), $final_name);

        $blog = new Blog();
        $data = $request->only($blog->getFillable());
        if(empty($data['post_slug'])) {
            unset($data['post_slug']);
            $data['post_slug'] = Str::slug($request->post_title);
        }

        if(preg_match('/\s/',$data['post_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }

        unset($data['post_photo']);
        $data['post_photo'] = $final_name;
        
        $blog->fill($data)->save();

        return redirect()->route('admin_blog_view')->with('success', SUCCESS_DATA_ADD);
    }

    public function edit($id) {
        $blog = Blog::findOrFail($id);
        $category=DB::table('categories')->get();
        return view('admin.blog_edit', compact('blog','category'));
    }

    public function update(Request $request, $id) {

        $blog = Blog::findOrFail($id);
        $data = $request->only($blog->getFillable());

        if ($request->hasFile('post_photo')) {

            $request->validate([
                'post_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'post_photo.image' => ERR_PHOTO_IMAGE,
                'post_photo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'post_photo.max' => ERR_PHOTO_MAX
            ]);

            unlink(public_path('uploads/post_photos/'.$blog->post_photo));

            // Uploading the file
            $rand_value = md5(mt_rand(11111111,99999999));
            $ext = $request->file('post_photo')->extension();
            $final_name = $rand_value.'.'.$ext;
            $request->file('post_photo')->move(public_path('uploads/post_photos/'), $final_name);

            unset($data['post_photo']);
            $data['post_photo'] = $final_name;
        }

        $request->validate([
            'post_title'   =>  [
                'required',
                Rule::unique('blogs')->ignore($id),
            ],
            'post_slug'   =>  [
                Rule::unique('blogs')->ignore($id),
            ]
        ],[
            'post_title.required' => ERR_NAME_REQUIRED,
            'post_title.unique' => ERR_NAME_EXIST,
            'post_slug.unique' => ERR_SLUG_UNIQUE,
        ]);

        if(empty($data['post_slug'])) {
            unset($data['post_slug']);
            $data['post_slug'] = Str::slug($request->post_title);
        }

        if(preg_match('/\s/',$data['post_slug'])) {
            return Redirect()->back()->with('error', ERR_SLUG_WHITESPACE);
        }

        $blog->fill($data)->save();

        return redirect()->route('admin_blog_view')->with('success', SUCCESS_DATA_UPDATE);
    }

    public function destroy($id) {
        $blog = Blog::findOrFail($id);
        unlink(public_path('uploads/post_photos/'.$blog->post_photo));
        $blog->delete();

        Comment::where('blog_id',$blog->id)->delete();

        return Redirect()->back()->with('success', SUCCESS_DATA_DELETE);
    }

}
