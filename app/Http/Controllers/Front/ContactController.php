<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Mail\ContactPageMessage;
use App\Models\Admin;
use App\Models\EmailTemplate;
use App\Models\GeneralSetting;
use App\Models\PageContactItem;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $contact_data = PageContactItem::where('id', 1)->first();
        return view('front.contact', compact('contact_data','g_setting'));
    }

    public function send_email(Request $request) {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $request->validate([
            'visitor_name' => 'required',
            'visitor_email' => 'required|email',
            'visitor_message' => 'required'
        ], [
            'visitor_name.required' => ERR_NAME_REQUIRED,
            'visitor_email.required' => ERR_EMAIL_REQUIRED,
            'visitor_email.email' => ERR_EMAIL_INVALID,
            'visitor_message.required' => ERR_MESSAGE_REQUIRED,
        ]);

        if($g_setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ], [
                'g-recaptcha-response.required' => ERR_RECAPTCHA_REQUIRED
            ]);
        }

        // Send Email
        $email_template_data = EmailTemplate::where('id', 1)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $message = str_replace('[[visitor_name]]', $request->visitor_name, $message);
        $message = str_replace('[[visitor_email]]', $request->visitor_email, $message);
        $message = str_replace('[[visitor_phone]]', $request->visitor_phone, $message);
        $message = str_replace('[[visitor_message]]', $request->visitor_message, $message);

        $admin_data = Admin::where('id',1)->first();

        Mail::to($admin_data->email)->send(new ContactPageMessage($subject,$message));

        return redirect()->back()->with('success', SUCCESS_CONTACT_MESSAGE);
    }

}
