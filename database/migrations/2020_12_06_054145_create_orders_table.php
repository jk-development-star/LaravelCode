<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->text('txnid');
            $table->text('paid_amount');
            $table->text('fee_amount');
            $table->text('net_amount');
            $table->text('payment_method');
            $table->text('payment_status');
            $table->text('payer_id');
            $table->text('payer_first_name');
            $table->text('payer_last_name');
            $table->text('payer_email');
            $table->text('payer_country_code');
            $table->text('order_no');
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
        Schema::dropIfExists('orders');
    }
}
