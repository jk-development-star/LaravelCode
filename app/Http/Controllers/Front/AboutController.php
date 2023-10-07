<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\PageAboutItem;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class AboutController extends Controller
{
    public function index() {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $about_data = PageAboutItem::where('id', 1)->first();
        return view('front.about', compact('about_data','g_setting'));
    }
}
