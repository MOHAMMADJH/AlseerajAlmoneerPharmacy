<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('quantity');


            $table->unsignedInteger('product_id');
            $table->foreign('product_id')
                ->references('id')->on('products');


            $table->unsignedInteger('bill_id');
            $table->foreign('bill_id')
                ->references('id')->on('bills');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_products');
    }
}
