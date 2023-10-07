<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingLocation extends Model
{
    protected $fillable = [
        'listing_location_name',
        'listing_location_slug',
        'listing_location_photo',
        'seo_title',
        'seo_meta_description'
    ];

    public function rListing() {
        return $this->hasMany( Listing::class, 'listing_location_id', 'id' );
    }

}
