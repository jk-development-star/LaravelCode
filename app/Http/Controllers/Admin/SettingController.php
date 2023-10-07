<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class SettingController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function edit()
    {
        $setting = GeneralSetting::where('id',1)->first();
        return view('admin.setting_general', compact('setting'));
    }

    public function update(Request $request)
    {
        if($request->logo != '')
        {
            $request->validate([
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'logo.image' => ERR_PHOTO_IMAGE,
                'logo.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'logo.max' => ERR_PHOTO_MAX
            ]);

            unlink(public_path('uploads/site_photos/'.$request->current_logo));

            $ext = $request->file('logo')->extension();
            $rand_value = md5(mt_rand(11111111,99999999));
            $final_name = $rand_value.'.'.$ext;
            $request->file('logo')->move(public_path('uploads/site_photos/'), $final_name);

            $data['logo'] = $final_name;
        }

        if($request->favicon != '')
        {
            $request->validate([
                'favicon' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ],[
                'favicon.image' => ERR_PHOTO_IMAGE,
                'favicon.mimes' => ERR_PHOTO_JPG_PNG_GIF,
                'favicon.max' => ERR_PHOTO_MAX
            ]);

            unlink(public_path('uploads/site_photos/'.$request->current_favicon));

            $ext = $request->file('favicon')->extension();
            $rand_value = md5(mt_rand(11111111,99999999));
            $final_name1 = $rand_value.'.'.$ext;
            $request->file('favicon')->move(public_path('uploads/site_photos/'), $final_name1);

            $data['favicon'] = $final_name1;
        }

        $data['footer_column_1_heading'] = $request->input('footer_column_1_heading');
        $data['footer_column_1_total_item'] = $request->input('footer_column_1_total_item');
        $data['footer_column_2_heading'] = $request->input('footer_column_2_heading');
        $data['footer_column_2_total_item'] = $request->input('footer_column_2_total_item');
        $data['footer_column_3_heading'] = $request->input('footer_column_3_heading');
        $data['footer_column_4_heading'] = $request->input('footer_column_4_heading');

        $data['footer_address'] = $request->input('footer_address');
        $data['footer_email'] = $request->input('footer_email');
        $data['footer_phone'] = $request->input('footer_phone');
        $data['footer_copyright'] = $request->input('footer_copyright');

        $data['google_recaptcha_site_key'] = $request->input('google_recaptcha_site_key');
        $data['google_recaptcha_status'] = $request->input('google_recaptcha_status');

        $data['google_analytic_tracking_id'] = $request->input('google_analytic_tracking_id');
        $data['google_analytic_status'] = $request->input('google_analytic_status');

        $data['tawk_live_chat_property_id'] = $request->input('tawk_live_chat_property_id');
        $data['tawk_live_chat_status'] = $request->input('tawk_live_chat_status');

        $data['cookie_consent_message'] = $request->input('cookie_consent_message');
        $data['cookie_consent_button_text'] = $request->input('cookie_consent_button_text');
        $data['cookie_consent_text_color'] = $request->input('cookie_consent_text_color');
        $data['cookie_consent_bg_color'] = $request->input('cookie_consent_bg_color');
        $data['cookie_consent_button_text_color'] = $request->input('cookie_consent_button_text_color');
        $data['cookie_consent_button_bg_color'] = $request->input('cookie_consent_button_bg_color');
        $data['cookie_consent_status'] = $request->input('cookie_consent_status');

        $data['customer_listing_option'] = $request->input('customer_listing_option');
        $data['layout_direction'] = $request->input('layout_direction');

        $data['theme_color'] = $request->input('theme_color');

        GeneralSetting::where('id',1)->update($data);
        return redirect()->back()->with('success', SUCCESS_ACTION);
    }


    public function payment_edit()
    {
        $g_setting = GeneralSetting::where('id',1)->first();
        return view('admin.setting_payment', compact('g_setting'));
    }

    public function payment_update(Request $request)
    {
        $data['paypal_environment'] = $request->get('paypal_environment');
        $data['paypal_client_id'] = $request->get('paypal_client_id');
        $data['paypal_secret_key'] = $request->get('paypal_secret_key');

        GeneralSetting::where('id',1)->update($data);

        return redirect()->back()->with('success', SUCCESS_ACTION);
    }


}
