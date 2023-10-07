<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\PageHomeItem;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\ListingCategory;
use App\Models\ListingLocation;
use DB;
use App\Models\knowledgecategory;
use App\Models\kb_subcats;
use App\Models\kb_topics;
class HomeController extends Controller
{
    public function index() {
    	$page_home_items = PageHomeItem::where('id',1)->first();

        $listing_categories = ListingCategory::orderBy('listing_category_name','asc')->get();
        $listing_locations = ListingLocation::orderBy('listing_location_name','asc')->get();

        $orderwise_listing_categories = DB::select('SELECT *
                        FROM listing_categories as r1
                        LEFT JOIN (SELECT listing_category_id, count(*) as total
                            FROM listings as l
                            JOIN listing_categories as lc
                            ON l.listing_category_id = lc.id
                            GROUP BY listing_category_id
                            ORDER BY total DESC) as r2
                        ON r1.id = r2.listing_category_id
                        ORDER BY r2.total DESC');

        $orderwise_listing_locations = DB::select('SELECT *
                        FROM listing_locations as r1
                        LEFT JOIN (SELECT listing_location_id, count(*) as total
                            FROM listings as l
                            JOIN listing_locations as ll
                            ON l.listing_location_id = ll.id
                            GROUP BY listing_location_id
                            ORDER BY total DESC) as r2
                        ON r1.id = r2.listing_location_id
                        ORDER BY r2.total DESC');

        $listings = Listing::with('rListingCategory','rListingLocation')
            ->orderBy('listing_name','asc')
            ->where('listing_status','Active')
            ->where('is_featured','Yes')
            ->get();

        return view('front.index', compact('page_home_items','orderwise_listing_categories','orderwise_listing_locations','listings','listing_categories','listing_locations'));
    }
    //code by ayan
    public function view_kb_cat(Request $request){
        $main_cat = knowledgecategory::find($request->id);
        $subcats = kb_subcats::where('category_id',$request->id)->get();
        $first_subcat = kb_subcats::where('category_id',$request->id)->first();
        if ($first_subcat!=null){
        $topic = kb_topics::where('cat_id',$first_subcat->id)->first();
        } else{
            $topic='';
        }
        return view('front.view_kb_cat',compact('main_cat','subcats','topic'));
    }
    public function get_kb_cat(Request $request){
         $main_cat = knowledgecategory::find($request->cat);
        $subcats = kb_subcats::where('category_id',$request->cat)->get();
        if ($subcats!=null){
            $topic = kb_topics::where('cat_id',$request->subcat)->first();
        } else{
            $topic='';
        }
        return view('front.view_kb_cat',compact('main_cat','subcats','topic'));
    }
    //code by ayan
}
