<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function detail($slug) {
        $category_single = Category::where('category_slug', $slug)->first();
        if(!$category_single) {
            return abort(404);
        }
        $g_setting = GeneralSetting::where('id', 1)->first();

        $blog_items = Blog::with('rCategory')
            ->where('category_id', $category_single->id)
            ->paginate(9);

        $blog_items_no_pagi = Blog::orderby('id', 'desc')->get();
        $categories = Category::get();
        return view('front.category', compact('g_setting','blog_items','blog_items_no_pagi','categories','category_single'));
    }
}
