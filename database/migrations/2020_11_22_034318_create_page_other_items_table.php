<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageOtherItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_other_items', function (Blueprint $table) {
            $table->id();
            $table->text('login_page_seo_title')->nullable();
            $table->text('login_page_seo_meta_description')->nullable();
            $table->text('registration_page_seo_title')->nullable();
            $table->text('registration_page_seo_meta_description')->nullable();
            $table->text('forget_password_page_seo_title')->nullable();
            $table->text('forget_password_page_seo_meta_description')->nullable();
            $table->text('customer_panel_page_seo_title')->nullable();
            $table->text('customer_panel_page_seo_meta_description')->nullable();
            $table->text('payment_page_seo_title')->nullable();
            $table->text('payment_page_seo_meta_description')->nullable();
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
        Schema::dropIfExists('page_other_items');
    }
}
