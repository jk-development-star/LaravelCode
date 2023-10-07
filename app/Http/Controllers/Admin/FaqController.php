<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class FaqController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function index() {
        $faq = Faq::orderBy('faq_order')->get();
        return view('admin.faq_view', compact('faq'));
    }

    public function create() {
        return view('admin.faq_create');
    }

    public function store(Request $request) {
        $faq = new Faq();
        $data = $request->only($faq->getFillable());

        $request->validate([
            'faq_title' => 'required',
            'faq_content' => 'required',
            'faq_order' => 'numeric|min:0|max:32767'
        ],[
            'faq_title.required' => ERR_TITLE_REQUIRED,
            'faq_content.required' => ERR_CONTENT_REQUIRED,
            'faq_order.numeric' => ERR_ORDER_NUMERIC,
            'faq_order.min' => ERR_ORDER_MIN,
            'faq_order.max' => ERR_ORDER_MAX,
        ]);

        $faq->fill($data)->save();
        return redirect()->route('admin_faq_view')->with('success', SUCCESS_ACTION);
    }

    public function edit($id) {
        $faq = Faq::findOrFail($id);
        return view('admin.faq_edit', compact('faq'));
    }

    public function update(Request $request, $id) {
        $faq = Faq::findOrFail($id);
        $data = $request->only($faq->getFillable());

        $request->validate([
            'faq_title' => 'required',
            'faq_content' => 'required',
            'faq_order' => 'numeric|min:0|max:32767'
        ],[
            'faq_title.required' => ERR_TITLE_REQUIRED,
            'faq_content.required' => ERR_CONTENT_REQUIRED,
            'faq_order.numeric' => ERR_ORDER_NUMERIC,
            'faq_order.min' => ERR_ORDER_MIN,
            'faq_order.max' => ERR_ORDER_MAX,
        ]);

        $faq->fill($data)->save();
        return redirect()->route('admin_faq_view')->with('success', SUCCESS_ACTION);
    }

    public function destroy($id){
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }
}
