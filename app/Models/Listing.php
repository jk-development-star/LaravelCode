<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'listing_name',
        'listing_slug',
        'listing_description',
        'listing_address',
        'listing_phone',
        'listing_email',
        'listing_website',
        'listing_map',
        'listing_oh_monday',
        'listing_oh_tuesday',
        'listing_oh_wednesday',
        'listing_oh_thursday',
        'listing_oh_friday',
        'listing_oh_saturday',
        'listing_oh_sunday',
        'listing_featured_photo',
        'listing_category_id',
        'listing_location_id',
        'user_id',
        'admin_id',
        'user_type',
        'seo_title',
        'seo_meta_description',
        'listing_status',
        'is_featured'
    ];

    public function rListingCategory() {
        return $this->belongsTo( ListingCategory::class, 'listing_category_id' );
    }

    public function rListingLocation() {
        return $this->belongsTo( ListingLocation::class, 'listing_location_id' );
    }

}
