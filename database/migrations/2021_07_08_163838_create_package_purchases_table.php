<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('package_id');
            $table->text('transaction_id');
            $table->text('paid_amount');
            $table->text('payment_method');
            $table->text('payment_status');
            $table->text('package_start_date');
            $table->text('package_end_date');
            $table->text('currently_active');
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
        Schema::dropIfExists('package_purchases');
    }
}
