<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->text('logo');
            $table->text('favicon');
            $table->text('footer_column_1_heading');
            $table->text('footer_column_2_heading');
            $table->text('footer_column_3_heading');
            $table->text('footer_column_4_heading');
            $table->text('footer_address');
            $table->text('footer_email');
            $table->text('footer_phone');
            $table->text('footer_copyright');
            $table->text('google_analytic_tracking_id');
            $table->text('google_analytic_status');
            $table->text('tawk_live_chat_code');
            $table->text('tawk_live_chat_status');
            $table->text('cookie_consent_message');
            $table->text('cookie_consent_button_text');
            $table->text('cookie_consent_text_color');
            $table->text('cookie_consent_bg_color');
            $table->text('cookie_consent_button_text_color');
            $table->text('cookie_consent_button_bg_color');
            $table->text('cookie_consent_status');
            $table->text('google_recaptcha_site_key');
            $table->text('google_recaptcha_status');
            $table->text('paypal_environment');
            $table->text('paypal_client_id');
            $table->text('paypal_secret_key');
            $table->text('stripe_public_key');
            $table->text('stripe_secret_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_settings');
    }
}
