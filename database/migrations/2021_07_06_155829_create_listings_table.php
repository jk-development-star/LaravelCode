<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->text('listing_name');
            $table->text('listing_slug')->nullable();
            $table->text('listing_description');
            $table->text('listing_address');
            $table->text('listing_phone');
            $table->text('listing_email');
            $table->text('listing_website')->nullable();
            $table->text('listing_map')->nullable();
            $table->text('listing_oh_monday')->nullable();
            $table->text('listing_oh_tuesday')->nullable();
            $table->text('listing_oh_wednesday')->nullable();
            $table->text('listing_oh_thursday')->nullable();
            $table->text('listing_oh_friday')->nullable();
            $table->text('listing_oh_saturday')->nullable();
            $table->text('listing_oh_sunday')->nullable();
            $table->text('listing_featured_photo');
            $table->integer('listing_category_id');
            $table->integer('listing_location_id');
            $table->integer('user_id');
            $table->text('user_type');
            $table->text('seo_title')->nullable();
            $table->text('seo_meta_description')->nullable();
            $table->text('listing_status');
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
        Schema::dropIfExists('listings');
    }
}
