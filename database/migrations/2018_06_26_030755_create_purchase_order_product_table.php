<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('purchase_order_products')) {
            Schema::create('purchase_order_products', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('purchase_order_id');
                $table->unsignedInteger('product_id');
                $table->double('amount', 6, 2);
                $table->timestamps();

                $table->index(['purchase_order_id', 'product_id']);
                $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
                $table->foreign('product_id')->references('id')->on('products');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order_products');
    }
}
