<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageServiceItem extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'status',
        'seo_title',
        'seo_meta_description'
    ];

}
