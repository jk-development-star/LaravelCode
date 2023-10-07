<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SocialMediaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class SocialMediaItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $social_media = SocialMediaItem::orderBy('social_order')->get();
        return view('admin.social_media_view', compact('social_media'));
    }

    public function create()
    {
        return view('admin.social_media_create');
    }

    public function store(Request $request)
    {
        $social_media = new SocialMediaItem();
        $data = $request->only($social_media->getFillable());

        $request->validate([
            'social_url' => 'required',
            'social_icon' => 'required',
            'social_order' => 'numeric|min:0|max:32767'
        ],[
            'social_url.required' => ERR_URL_REQUIRED,
            'social_icon.required' => ERR_ICON_REQUIRED,
            'social_order.numeric' => ERR_ORDER_NUMERIC,
            'social_order.min' => ERR_ORDER_MIN,
            'social_order.max' => ERR_ORDER_MAX,
        ]);

        $social_media->fill($data)->save();
        return redirect()->route('admin_social_media_view')->with('success', SUCCESS_ACTION);
    }

    public function edit($id)
    {
        $social_media = SocialMediaItem::findOrFail($id);
        return view('admin.social_media_edit', compact('social_media'));
    }

    public function update(Request $request, $id)
    {
        $social_media = SocialMediaItem::findOrFail($id);
        $data = $request->only($social_media->getFillable());

        $request->validate([
            'social_url' => 'required',
            'social_icon' => 'required',
            'social_order' => 'numeric|min:0|max:32767'
        ],[
            'social_url.required' => ERR_URL_REQUIRED,
            'social_icon.required' => ERR_ICON_REQUIRED,
            'social_order.numeric' => ERR_ORDER_NUMERIC,
            'social_order.min' => ERR_ORDER_MIN,
            'social_order.max' => ERR_ORDER_MAX,
        ]);

        $social_media->fill($data)->save();
        return redirect()->route('admin_social_media_view')->with('success', SUCCESS_ACTION);
    }

    public function destroy($id)
    {
        $social_media = SocialMediaItem::findOrFail($id);
        $social_media->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }
}
