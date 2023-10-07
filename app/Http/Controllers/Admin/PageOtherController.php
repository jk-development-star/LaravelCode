<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class PageOtherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function edit()
    {
        $page_other = PageOtherItem::where('id',1)->first();
        return view('admin.page_other', compact('page_other'));
    }

    public function update(Request $request)
    {
        $data['login_page_seo_title'] = $request->input('login_page_seo_title');
        $data['login_page_seo_meta_description'] = $request->input('login_page_seo_meta_description');

        $data['registration_page_seo_title'] = $request->input('registration_page_seo_title');
        $data['registration_page_seo_meta_description'] = $request->input('registration_page_seo_meta_description');

        $data['forget_password_page_seo_title'] = $request->input('forget_password_page_seo_title');
        $data['forget_password_page_seo_meta_description'] = $request->input('forget_password_page_seo_meta_description');

        $data['customer_panel_page_seo_title'] = $request->input('customer_panel_page_seo_title');
        $data['customer_panel_page_seo_meta_description'] = $request->input('customer_panel_page_seo_meta_description');

        PageOtherItem::where('id',1)->update($data);
        return redirect()->back()->with('success', SUCCESS_ACTION);
    }
}
