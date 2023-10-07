<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class DynamicPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $dynamic_page = DynamicPage::all();
        return view('admin.dynamic_page_view', compact('dynamic_page'));
    }

    public function create()
    {
        return view('admin.dynamic_page_create');
    }

    public function store(Request $request)
    {
        $dynamic_page = new DynamicPage();
        $data = $request->only($dynamic_page->getFillable());

        $request->validate([
            'dynamic_page_name' => 'required|unique:dynamic_pages',
            'dynamic_page_slug' => 'unique:dynamic_pages'
        ],[
            'dynamic_page_name.required' => ERR_NAME_REQUIRED,
            'dynamic_page_name.unique' => ERR_NAME_EXIST,
            'dynamic_page_slug.unique' => ERR_SLUG_UNIQUE,
        ]);

        if(empty($data['dynamic_page_slug'])) {
            $data['dynamic_page_slug'] = Str::slug($request->dynamic_page_name);
        }
        
        $dynamic_page->fill($data)->save();
        return redirect()->route('admin_dynamic_page_view')->with('success', SUCCESS_ACTION);
    }

    public function edit($id)
    {
        $dynamic_page = DynamicPage::findOrFail($id);
        return view('admin.dynamic_page_edit', compact('dynamic_page'));
    }

    public function update(Request $request, $id)
    {
        $dynamic_page = DynamicPage::findOrFail($id);
        $data = $request->only($dynamic_page->getFillable());

        $request->validate([
            'dynamic_page_name'   =>  [
                'required',
                Rule::unique('dynamic_pages')->ignore($id),
            ],
            'dynamic_page_slug'   =>  [
                Rule::unique('dynamic_pages')->ignore($id),
            ]
        ],[
            'dynamic_page_name.required' => ERR_NAME_REQUIRED,
            'dynamic_page_name.unique' => ERR_NAME_EXIST,
            'dynamic_page_slug.unique' => ERR_SLUG_UNIQUE,
        ]);
        $data['dynamic_page_banner'] = $dynamic_page->dynamic_page_banner;
        
        $dynamic_page->fill($data)->save();
        
        return redirect()->route('admin_dynamic_page_view')->with('success', SUCCESS_ACTION);
    }

    public function destroy($id)
    {
        $dynamic_page = DynamicPage::findOrFail($id);
        $dynamic_page->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }
}
