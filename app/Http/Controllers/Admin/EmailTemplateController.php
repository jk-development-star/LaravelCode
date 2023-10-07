<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class EmailTemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $email_template = EmailTemplate::orderBy('id')->get();
        return view('admin.email_template_view', compact('email_template'));
    }

    public function edit($id)
    {
        $email_template = EmailTemplate::findOrFail($id);

        return view('admin.email_template_edit', compact('email_template', 'id'));
    }

    public function update(Request $request, $id)
    {
        $email_template = EmailTemplate::findOrFail($id);
        $data = $request->only($email_template->getFillable());

        $request->validate([
            'et_subject' => 'required',
            'et_content' => 'required'
        ],[
            'et_subject.required' => ERR_SUBJECT_REQUIRED,
            'et_content.required' => ERR_CONTENT_REQUIRED,
        ]);

        $email_template->fill($data)->save();
        return redirect()->route('admin_email_template_view')->with('success', SUCCESS_ACTION);
    }
}
