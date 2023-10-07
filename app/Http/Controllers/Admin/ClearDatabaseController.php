<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Amenity;
use App\Models\DynamicPage;
use App\Models\Faq;
use App\Models\ListingVideo;
use App\Models\ListingAdditionalFeature;
use App\Models\ListingSocialItem;
use App\Models\ListingAmenity;
use App\Models\ListingPhoto;
use App\Models\ListingLocation;
use App\Models\ListingCategory;
use App\Models\Listing;
use App\Models\Package;
use App\Models\PackagePurchase;
use App\Models\Review;
use App\Models\SocialMediaItem;
use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailToAllSubscribers;
use DB;
use Auth;

class ClearDatabaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    public function index()
    {
        $blog_data = Blog::get();
        foreach($blog_data as $row) {
            unlink(public_path('uploads/post_photos/'.$row->post_photo));
        }
        Blog::truncate();


        $listing_photo_data = ListingPhoto::get();
        foreach($listing_photo_data as $row) {
            unlink(public_path('uploads/listing_photos/'.$row->photo));
        }
        ListingPhoto::truncate();


        $listing_location_data = ListingLocation::get();
        foreach($listing_location_data as $row) {
            unlink(public_path('uploads/listing_location_photos/'.$row->listing_location_photo));
        }
        ListingLocation::truncate();


        $listing_category_data = ListingCategory::get();
        foreach($listing_category_data as $row) {
            unlink(public_path('uploads/listing_category_photos/'.$row->listing_category_photo));
        }
        ListingCategory::truncate();


        $listing_data = Listing::get();
        foreach($listing_data as $row) {
            unlink(public_path('uploads/listing_featured_photos/'.$row->listing_featured_photo));
        }
        Listing::truncate();


        $user_data = User::get();
        foreach($user_data as $row) {
            if($row->photo!='') {
                unlink(public_path('uploads/user_photos/'.$row->photo));    
            }
            if($row->banner!='') {
                unlink(public_path('uploads/user_photos/'.$row->banner));    
            }
        }
        User::truncate();



        Comment::truncate();
        Category::truncate();
        Amenity::truncate();
        DynamicPage::truncate();
        Faq::truncate();
        ListingVideo::truncate();
        ListingAdditionalFeature::truncate();
        ListingSocialItem::truncate();
        ListingAmenity::truncate();
        Package::truncate();
        PackagePurchase::truncate();
        Review::truncate();
        SocialMediaItem::truncate();
        Wishlist::truncate();

        return redirect()->back()->with('success', SUCCESS_DATABASE_CLEAR);
    }

}
