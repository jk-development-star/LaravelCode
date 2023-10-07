<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    public function detail($slug) {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $dynamic_page_detail = DynamicPage::where('dynamic_page_slug', $slug)->first();
        if(!$dynamic_page_detail) {
            return abort(404);
        }
        return view('front.dynamic_page', compact('g_setting','dynamic_page_detail'));
    }
}
