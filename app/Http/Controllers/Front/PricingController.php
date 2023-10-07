<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\PagePricingItem;
use App\Models\Package;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class PricingController extends Controller
{
    public function index() {
        $g_setting = GeneralSetting::where('id', 1)->first();
        $pricing_data = PagePricingItem::where('id', 1)->first();
        $pricing = Package::orderBy('package_order', 'asc')->get();
        return view('front.pricing', compact('pricing_data','g_setting','pricing'));
    }
}
