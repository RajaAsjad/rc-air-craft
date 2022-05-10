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
            $table->bigInteger('user_id')->comment('customer id');
            $table->bigInteger('order_number')->comment('Generate 6 digits random number as a order number');
            $table->string('coupon_id')->nullable();
            $table->string('payment_method')->nullable()->comment('Stripe or Paypal');
            $table->bigInteger('total_amount');
            $table->string('discount_type')->nullable();
            $table->float('discount_amount')->nullable();
            $table->string('net_amount');
            $table->date('order_date');
            $table->string('order_status')->comment('succeeded, failed');
            $table->boolean('status')->default(1)->comment('1=active, 0=deactive');
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
