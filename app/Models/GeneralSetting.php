<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [
        'logo',
        'favicon',
        'footer_column_1_heading',
        'footer_column_1_total_item',
        'footer_column_2_heading',
        'footer_column_2_total_item',
        'footer_column_3_heading',
        'footer_column_4_heading',
        'footer_address',
        'footer_email',
        'footer_phone',
        'footer_copyright',
        'google_analytic_tracking_id',
        'google_analytic_status',
        'tawk_live_chat_property_id',
        'tawk_live_chat_status',
        'cookie_consent_message',
        'cookie_consent_button_text',
        'cookie_consent_text_color',
        'cookie_consent_bg_color',
        'cookie_consent_button_text_color',
        'cookie_consent_button_bg_color',
        'cookie_consent_status',
        'google_recaptcha_site_key',
        'google_recaptcha_status',
        'theme_color',
        'customer_listing_option',
        'layout_direction',
        'paypal_environment',
        'paypal_client_id',
        'paypal_secret_key',
        'stripe_public_key',
        'stripe_secret_key'
    ];

}
