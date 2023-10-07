<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMessageToAdmin;
use App\Models\Admin;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Hash;
use Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
	public function __construct() {
    	$this->middleware('guest:admin')->except('logout');
    }

    public function login() {
        return view('admin.login');
    }

    public function login_check(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => ERR_EMAIL_REQUIRED,
            'email.email' => ERR_EMAIL_INVALID,
            'password.required' => ERR_PASSWORD_REQUIRED
        ]);

        $credential = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('admin_dashboard');
        } else {
            return redirect()->back()->with('error', ERR_ADMIN_NOT_FOUND);
        }
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function forget_password() {
        return view('admin.forget_password');
    }

    public function forget_password_check(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ],[
            'email.required' => ERR_EMAIL_REQUIRED,
            'email.email' => ERR_EMAIL_INVALID,
        ]);

        $check_email = Admin::where('email',$request->email)->first();
        if(!$check_email) {
            return redirect()->back()->with('error', 'Email address not found');
        } else {
            $et_data = EmailTemplate::where('id', 5)->first();
            $subject = $et_data->et_subject;
            $message = $et_data->et_content;

            $token = hash('sha256',time());
            $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
            $message = str_replace('[[reset_link]]', $reset_link, $message);

            $data['token'] = $token;
            Admin::where('id',1)->update($data);

            Mail::to($request->email)->send(new ResetPasswordMessageToAdmin($subject,$message));
        }

        return redirect()->back()->with('success', SUCCESS_FORGET_PASSWORD_EMAIL_SEND);
    }

    public function reset_password($token,$email) {
        $check = Admin::where('token', $token)->where('email', $email)->first();
        if(!$check) {
            return redirect()->route('admin_login');
        }
        return view('admin.reset_password', compact('token', 'email'));
    }

    public function reset_password_update(Request $request)
    {
        $request->validate([
            'new_password' => 'required',
            'retype_password' => 'required|same:new_password',
        ],[
            'new_password.required' => ERR_PASSWORD_REQUIRED,
            'retype_password.required' => ERR_RE_PASSWORD_REQUIRED,
            'retype_password.same' => ERR_PASSWORDS_MATCH
        ]);
        $data['password'] = Hash::make($request->new_password);
        $data['token'] = '';
        Admin::where('token',$request->token)->where('email',$request->email)->update($data);
        return redirect()->route('admin_login')->with('success', SUCCESS_RESET_PASSWORD);
    }
}
