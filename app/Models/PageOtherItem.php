<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageOtherItem extends Model
{
    protected $fillable = [
        'login_page_seo_title',
        'login_page_seo_meta_description',
        'registration_page_seo_title',
        'registration_page_seo_meta_description',
        'forget_password_page_seo_title',
        'forget_password_page_seo_meta_description',
        'customer_panel_page_seo_title',
        'customer_panel_page_seo_meta_description'
    ];
}
