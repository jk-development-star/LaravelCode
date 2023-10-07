<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageHomeItem extends Model
{
    protected $fillable = [
        'seo_title',
        'seo_meta_description',
        'search_heading',
        'search_text',
        'search_background',
        'category_heading',
        'category_subheading',
        'category_total',
        'category_status',
        'listing_heading',
        'listing_subheading',
        'listing_status',
        'location_heading',
        'location_subheading',
        'location_total',
        'location_status'
    ];

}
