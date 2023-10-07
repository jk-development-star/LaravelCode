<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingSocialItem extends Model
{
    protected $fillable = [
        'listing_id',
        'social_icon',
        'social_url'
    ];

}
