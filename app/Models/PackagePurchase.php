<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackagePurchase extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
        'transaction_id',
        'paid_amount',
        'payment_method',
        'payment_status',
        'package_start_date',
        'package_end_date',
        'currently_active'
    ];

    public function rPackage() {
        return $this->belongsTo( Package::class, 'package_id' );
    }

    public function rUser() {
        return $this->belongsTo( User::class, 'user_id' );
    }

}
