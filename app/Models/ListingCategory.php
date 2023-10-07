<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingCategory extends Model
{
    protected $fillable = [
        'listing_category_name',
        'listing_category_slug',
        'listing_category_photo',
        'seo_title',
        'seo_meta_description'
    ];

    public function rListing() {
        return $this->hasMany( Listing::class, 'listing_category_id', 'id' );
    }

}