<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\LanguageMenuText;
use App\Models\LanguageWebsiteText;
use App\Models\LanguageNotificationText;
use App\Models\LanguageAdminPanelText;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class LanguageController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function language_menu_text() {
        $language_data = LanguageMenuText::orderBy('id', 'asc')->get();
        return view('admin.language_menu_text_view', compact('language_data'));
    }

    public function language_menu_text_update(Request $request) {
        $i=0;
        foreach(request('lang_id') as $value) {
            $arr1[$i] = $value;
            $i++;
        }
        $i=0;
        foreach(request('lang_key') as $value){
            $arr2[$i] = $value;
            $i++;
        }
        $i=0;
        foreach(request('lang_value') as $value){
            $arr3[$i] = $value;
            $i++;
        }
        for($i=0;$i<count($arr1);$i++){
            $data = array();
            $data['lang_value'] = $arr3[$i];
            LanguageMenuText::where('id', $arr1[$i])->update($data);
        }
        return redirect()->back()->with('success', SUCCESS_ACTION);
    }


    public function language_website_text() {
        $language_data = LanguageWebsiteText::orderBy('id', 'asc')->get();
        return view('admin.language_website_text_view', compact('language_data'));
    }

    public function language_website_text_update(Request $request) {
        $i=0;
        foreach(request('lang_id') as $value) {
            $arr1[$i] = $value;
            $i++;
        }
        $i=0;
        foreach(request('lang_key') as $value){
            $arr2[$i] = $value;
            $i++;
        }
        $i=0;
        foreach(request('lang_value') as $value){
            $arr3[$i] = $value;
            $i++;
        }
        for($i=0;$i<count($arr1);$i++){
            $data = array();
            $data['lang_value'] = $arr3[$i];
            LanguageWebsiteText::where('id', $arr1[$i])->update($data);
        }
        return redirect()->back()->with('success', SUCCESS_ACTION);
    }

    public function language_notification_text() {
        $language_data = LanguageNotificationText::orderBy('id', 'asc')->get();
        return view('admin.language_notification_text_view', compact('language_data'));
    }

    public function language_notification_text_update(Request $request) {
        $i=0;
        foreach(request('lang_id') as $value) {
            $arr1[$i] = $value;
            $i++;
        }
        $i=0;
        foreach(request('lang_key') as $value){
            $arr2[$i] = $value;
            $i++;
        }
        $i=0;
        foreach(request('lang_value') as $value){
            $arr3[$i] = $value;
            $i++;
        }
        for($i=0;$i<count($arr1);$i++){
            $data = array();
            $data['lang_value'] = $arr3[$i];
            LanguageNotificationText::where('id', $arr1[$i])->update($data);
        }
        return redirect()->back()->with('success', SUCCESS_ACTION);
    }


    public function language_admin_panel_text() {
        $language_data = LanguageAdminPanelText::orderBy('id', 'asc')->get();
        return view('admin.language_admin_panel_text_view', compact('language_data'));
    }

    public function language_admin_panel_text_update(Request $request) {
        $i=0;
        foreach(request('lang_id') as $value) {
            $arr1[$i] = $value;
            $i++;
        }
        $i=0;
        foreach(request('lang_key') as $value){
            $arr2[$i] = $value;
            $i++;
        }
        $i=0;
        foreach(request('lang_value') as $value){
            $arr3[$i] = $value;
            $i++;
        }
        for($i=0;$i<count($arr1);$i++){
            $data = array();
            $data['lang_value'] = $arr3[$i];
            LanguageAdminPanelText::where('id', $arr1[$i])->update($data);
        }
        return redirect()->back()->with('success', SUCCESS_ACTION);
    }

}
