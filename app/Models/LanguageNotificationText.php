<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageNotificationText extends Model
{
    protected $fillable = [
        'lang_key',
        'lang_value'
    ];

}
