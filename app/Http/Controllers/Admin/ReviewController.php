<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class ReviewController extends Controller
{
    public function __construct() {
        $this->middleware('auth.admin:admin');
    }

    public function view_admin_review() {
        $user_detail = Auth::user();
        $all_listing_items = Listing::orderBy('id', 'asc')->where('listing_status', 'Active')->get();
        $his_own_items = Listing::orderBy('id', 'asc')->where('user_id', 0)->where('admin_id',$user_detail->id)->get();
        $arr_own_item_ids = [];
        foreach($his_own_items as $row) {
            $arr_own_item_ids[] = $row->id;
        }
        return view('admin.review_view_admin', compact('user_detail','all_listing_items','arr_own_item_ids'));
    }

    public function store_admin_review(Request $request) {
        $user_detail = Auth::user();
        $request->validate([
            'review' => 'required'
        ],[
            'review.required' => ERR_REVIEW_REQUIRED
        ]);

        $obj = new Review;
        $obj->listing_id = $request->listing_id;
        $obj->agent_id = $user_detail->id;
        $obj->agent_type = 'Admin';
        $obj->rating = $request->rating;
        $obj->review = $request->review;
        $obj->save();

        return redirect()->back()->with('success', SUCCESS_ACTION);
    }


    public function update_admin_review(Request $request, $id) {
        $request->validate([
            'review' => 'required'
        ],[
            'review.required' => ERR_REVIEW_REQUIRED
        ]);
        Review::where('id', $id)
            ->update([
                'rating' => $request->rating,
                'review' => $request->review
            ]);
        return redirect()->back()->with('success', SUCCESS_ACTION);
    }

    public function delete_admin_review($id){
        $obj = Review::findOrFail($id);
        $obj->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }

    public function view_customer_review() {
        $reviews = Review::orderBy('id', 'asc')->where('agent_type', 'Customer')->get();
        return view('admin.review_view_customer', compact('reviews'));
    }

    public function delete_customer_review($id){
        $obj = Review::findOrFail($id);
        $obj->delete();
        return Redirect()->back()->with('success', SUCCESS_ACTION);
    }

}
