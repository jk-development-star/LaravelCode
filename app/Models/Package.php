<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_type',
        'package_name',
        'package_price',
        'valid_days',
        'total_listings',
        'total_amenities',
        'total_photos',
        'total_videos',
        'total_social_items',
        'total_additional_features',
        'allow_featured',
        'package_order'
    ];

    public function rPurchasePackage()
    {
        return $this->hasMany(PackagePurchase::class, 'package_id', 'id');
    }

}
