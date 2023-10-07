<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingVideo extends Model
{
    protected $fillable = [
        'listing_id',
        'youtube_video_id'
    ];

}
