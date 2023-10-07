<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'category_slug',
        'seo_title',
        'seo_meta_description'
    ];

    public function rBlog() {
        return $this->hasMany( Blog::class, 'category_id', 'id' );
    }
}
