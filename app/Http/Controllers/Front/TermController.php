<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\PageTermItem;
use Illuminate\Http\Request;
use DB;

class TermController extends Controller
{
    public function index() {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $terms_data = PageTermItem::where('id', 1)->first();
        return view('front.terms_and_conditions', compact('terms_data','g_setting'));
    }
}
