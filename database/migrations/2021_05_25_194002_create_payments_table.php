<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->bigInteger('transaction_id');
            $table->integer('transaction_status')->comment('1=Completed, 0=Failed');
            $table->date('transaction_date');
            $table->bigInteger('total_amount');
            $table->string('name_on_card');
            $table->string('card_number');
            $table->string('cvc');
            $table->string('expiration_month');
            $table->string('expiration_year');
            $table->string('deleted_at')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
