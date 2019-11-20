<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('cate_id')->unsigned();
            $table->integer('vendor_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->date('sale_date_start')->nullable();
            $table->date('sale_date_end')->nullable();
            $table->string('image');
            $table->text('description');
            $table->tinyInteger('featured');
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
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
