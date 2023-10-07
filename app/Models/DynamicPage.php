<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicPage extends Model
{
    protected $fillable = [
        'dynamic_page_name',
        'dynamic_page_slug',
        'dynamic_page_content',
        'seo_title',
        'seo_meta_description'
    ];

}