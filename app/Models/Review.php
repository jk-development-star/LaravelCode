<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'listing_id',
        'agent_id',
        'agent_type',
        'rating',
        'review'
    ];

}
