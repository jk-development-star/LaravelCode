<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'category_id',
        'post_title',
        'post_slug',
        'post_content',
        'post_content_short',
        'post_photo',
        'comment_show',
        'seo_title',
        'seo_meta_description'
    ];

    public function rCategory()
    {
        return $this->belongsTo( Category::class, 'category_id' );
    }

}
