<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PackagePurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class PurchaseHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $purchase_history = PackagePurchase::with('rPackage', 'rUser')
            ->orderBy('package_purchases.id', 'desc')
            ->get();

        return view('admin.purchase_history_view', compact('purchase_history'));
    }


    public function detail($id)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $detail = DB::table('package_purchases')
            ->join('packages', 'package_purchases.package_id', 'packages.id')
            ->select('package_purchases.*', 'packages.package_name')
            ->where('package_purchases.id', $id)
            ->first();

        if(!$detail)
        {
            abort(404);
        }

        return view('admin.purchase_history_detail', compact('g_setting','detail'));
    }

    public function invoice($id)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $detail = DB::table('package_purchases')
            ->join('packages', 'package_purchases.package_id', 'packages.id')
            ->join('users', 'package_purchases.user_id', 'users.id')
            ->select('package_purchases.*', 'packages.package_name', 'users.name', 'users.email')
            ->where('package_purchases.id', $id)
            ->first();
        
        if(!$detail)
        {
            abort(404);
        }

        return view('admin.purchase_history_invoice', compact('g_setting','detail'));
    }

    

    

}
