<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackagePurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class PackageController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function index() {
        $package = Package::orderBy('id')->get();
        return view('admin.package_view', compact('package'));
    }

    public function create() {
        return view('admin.package_create');
    }

    public function store(Request $request) {
        $package = new Package();
        $data = $request->only($package->getFillable());
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'valid_days' => 'required',
            'total_listings' => 'required',
            'total_amenities' => 'required',
            'total_photos' => 'required',
            'total_videos' => 'required',
            'total_social_items' => 'required',
            'total_additional_features' => 'required',
            'package_order' => 'numeric|min:0|max:32767'
        ],[
            'package_name.required' => ERR_NAME_REQUIRED,
            'package_price.required' => ERR_PRICE_REQUIRED,
            'valid_days.required' => ERR_VALID_DAYS_REQUIRED,
            'total_listings.required' => ERR_TOTAL_LISTING_REQUIRED,
            'total_amenities.required' => ERR_TOTAL_AMENITIES_REQUIRED,
            'total_photos.required' => ERR_TOTAL_PHOTOS_REQUIRED,
            'total_videos.required' => ERR_TOTAL_VIDEOS_REQUIRED,
            'total_social_items.required' => ERR_TOTAL_SOCIAL_ITEMS_REQUIRED,
            'total_additional_features.required' => ERR_TOTAL_ADDITIONAL_FEATURES_REQUIRED,
            'package_order.numeric' => ERR_ORDER_NUMERIC,
            'package_order.min' => ERR_ORDER_MIN,
            'package_order.max' => ERR_ORDER_MAX,
        ]);
        $package->fill($data)->save();
        return redirect()->route('admin_package_view')->with('success', SUCCESS_ACTION);
    }

    public function edit($id) {
        $package = Package::findOrFail($id);
        return view('admin.package_edit', compact('package'));
    }

    public function update(Request $request, $id) {
        $package = Package::findOrFail($id);
        $data = $request->only($package->getFillable());
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'valid_days' => 'required',
            'total_listings' => 'required',
            'total_amenities' => 'required',
            'total_photos' => 'required',
            'total_videos' => 'required',
            'total_social_items' => 'required',
            'total_additional_features' => 'required',
            'package_order' => 'numeric|min:0|max:32767'
        ],[
            'package_name.required' => ERR_NAME_REQUIRED,
            'package_price.required' => ERR_PRICE_REQUIRED,
            'valid_days.required' => ERR_VALID_DAYS_REQUIRED,
            'total_listings.required' => ERR_TOTAL_LISTING_REQUIRED,
            'total_amenities.required' => ERR_TOTAL_AMENITIES_REQUIRED,
            'total_photos.required' => ERR_TOTAL_PHOTOS_REQUIRED,
            'total_videos.required' => ERR_TOTAL_VIDEOS_REQUIRED,
            'total_social_items.required' => ERR_TOTAL_SOCIAL_ITEMS_REQUIRED,
            'total_additional_features.required' => ERR_TOTAL_ADDITIONAL_FEATURES_REQUIRED,
            'package_order.numeric' => ERR_ORDER_NUMERIC,
            'package_order.min' => ERR_ORDER_MIN,
            'package_order.max' => ERR_ORDER_MAX,
        ]);
        $package->fill($data)->save();
        return redirect()->route('admin_package_view')->with('success', SUCCESS_ACTION);
    }

    public function destroy($id) {
        // Can not delete a package if it is used in other table
        $tot = PackagePurchase::where('package_id',$id)->count();
        if($tot) {
            return Redirect()->back()->with('error', ERR_ITEM_DELETE);
        }

        $package = Package::findOrFail($id);
        $package->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }
}
