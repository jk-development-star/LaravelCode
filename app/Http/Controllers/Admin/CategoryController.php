<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $category = Category::all();
        return view('admin.category_view', compact('category'));
    }

    public function create()
    {
        return view('admin.category_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
            'category_slug' => 'unique:categories'
        ],[
            'category_name.required' => ERR_NAME_REQUIRED,
            'category_name.unique' => ERR_NAME_EXIST,
            'category_slug.unique' => ERR_SLUG_UNIQUE,
        ]);
        $category = new Category();
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin_category_view')->with('success', SUCCESS_DATA_ADD);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category_edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name'   =>  [
                'required',
                Rule::unique('categories')->ignore($id),
            ],
            'category_slug'   =>  [
                Rule::unique('categories')->ignore($id),
            ]
        ],[
            'category_name.required' => ERR_NAME_REQUIRED,
            'category_name.unique' => ERR_NAME_EXIST,
            'category_slug.unique' => ERR_SLUG_UNIQUE,
        ]);

        $category = Category::findOrFail($id);
        $data = $request->only($category->getFillable());
        if(empty($data['category_slug']))
        {
            unset($data['category_slug']);
            $data['category_slug'] = Str::slug($request->category_name);
        }
        $category->fill($data)->save();
        return redirect()->route('admin_category_view')->with('success', SUCCESS_DATA_UPDATE);
    }

    public function destroy($id)
    {
        $cnt = Blog::where('category_id',$id)->count();
        if($cnt>0) {
            return redirect()->back()->with('error', ERR_ITEM_DELETE);
        }

        // Deleting data from "categories" table
        $category = Category::findOrFail($id);
        $category->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', SUCCESS_DATA_DELETE);
    }

}
