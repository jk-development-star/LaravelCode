<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->text('package_type');
            $table->text('package_name');
            $table->text('package_price')->nullable();
            $table->text('valid_days');
            $table->text('total_listings');
            $table->text('total_amenities');
            $table->text('total_photos');
            $table->text('total_videos');
            $table->text('total_social_items');
            $table->text('total_additional_features');
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
        Schema::dropIfExists('packages');
    }
}
