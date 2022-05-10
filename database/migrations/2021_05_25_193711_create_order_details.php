<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->string('product_slug');
            $table->string('category_slug');
            $table->bigInteger('price');
            $table->bigInteger('quantity');
            $table->bigInteger('discount_type')->nullable();
            $table->float('discount_amount')->nullable();
            $table->float('tax')->nullable();
            $table->float('sub_total');
            $table->string('order_status')->comment('succeeded, failed');
            $table->boolean('status')->default(1)->comment('1=active, 0=deactive');
            $table->date('order_date');
            $table->string('deleted_at')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
