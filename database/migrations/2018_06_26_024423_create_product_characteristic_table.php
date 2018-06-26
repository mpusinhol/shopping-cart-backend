<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCharacteristicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product_characteristic')) {
            Schema::create('product_characteristic', function (Blueprint $table) {
                $table->unsignedInteger('product_id');
                $table->unsignedInteger('characteristic_id');
                $table->string('value', 50);
                $table->timestamps();

                $table->primary(['product_id', 'characteristic_id']);
                $table->foreign('product_id')->references('id')->on('product');
                $table->foreign('characteristic_id')->references('id')->on('characteristic');
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
        Schema::dropIfExists('product_characteristic');
    }
}