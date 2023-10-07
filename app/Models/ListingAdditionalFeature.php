<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingAdditionalFeature extends Model
{
    protected $fillable = [
        'listing_id',
        'additional_feature_name',
        'additional_feature_value'
    ];

}
