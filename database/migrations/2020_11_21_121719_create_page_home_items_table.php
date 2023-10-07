<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageHomeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_home_items', function (Blueprint $table) {
            $table->id();
            $table->text('seo_title')->nullable();
            $table->text('seo_meta_description')->nullable();
            $table->text('search_heading');
            $table->text('search_text');
            $table->text('search_background');
            $table->text('popular_category_heading');
            $table->text('popular_category_subheading');
            $table->text('popular_category_status');
            $table->text('popular_listing_heading');
            $table->text('popular_listing_subheading');
            $table->text('popular_listing_status');
            $table->text('popular_location_heading');
            $table->text('popular_location_subheading');
            $table->text('popular_location_status');
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
        Schema::dropIfExists('page_home_items');
    }
}
