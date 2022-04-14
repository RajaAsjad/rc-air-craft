<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by');
            $table->string('category_slug');
            $table->string('name');
            $table->string('slug');
            $table->string('price')->nullable();
            $table->date('draw_ends');
            $table->string('min_competition')->nullable();
            $table->string('max_competition')->nullable();
            $table->string('number_of_winners')->nullable();
            $table->string('short_description')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default(1)->comment('0=inactive,1= active,2= sold out');
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
        Schema::dropIfExists('products');
    }
}
