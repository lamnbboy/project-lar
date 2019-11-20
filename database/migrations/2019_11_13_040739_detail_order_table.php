<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->integer('id_order')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('quantity');
            $table->bigInteger('money');

            $table->primary(['id_order', 'id_product']);

            $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');

            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('detail_orders');
    }
}
