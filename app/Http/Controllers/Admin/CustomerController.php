<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Listing;
use App\Models\PackagePurchase;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
Use Auth;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function index() {
        $customers = User::get();
        return view('admin.customer_view', compact('customers'));
    }

    public function detail($id) {
        $customer_detail = User::where('id',$id)->first();
        return view('admin.customer_detail', compact('customer_detail'));
    }

    public function destroy($id) {

        // Before deleting, check this customer is used in another table
        $cnt = Listing::where('admin_id',0)->where('user_id',$id)->count();
        if($cnt>0) {
            return redirect()->back()->with('error', ERR_ITEM_DELETE);
        }

        $cnt1 = PackagePurchase::where('user_id',$id)->count();
        if($cnt1>0) {
            return redirect()->back()->with('error', ERR_ITEM_DELETE);
        }

        $cnt2 = Review::where('agent_id',$id)->where('agent_type','Customer')->count();
        if($cnt2>0) {
            return redirect()->back()->with('error', ERR_ITEM_DELETE);
        }

        User::where('id', $id)->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }

    public function change_status($id) {
        $customer = User::find($id);
        if($customer->status == 'Active') {
            $customer->status = 'Pending';
            $message=SUCCESS_ACTION;
        } else {
            $customer->status = 'Active';
            $message=SUCCESS_ACTION;
        }
        $customer->save();
        return response()->json($message);
    }
}
