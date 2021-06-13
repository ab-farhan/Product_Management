<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDamagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_damages', function (Blueprint $table) {
            $table->bigIncrements('damage_id');
            $table->integer('product_id');
            $table->integer('damage_quantity');
            $table->string('damage_chalan')->nullable();
            $table->string('damage_remarks')->nullable();
            $table->string('damage_slug',50)->nullable();
            $table->integer('damage_creator');
            $table->integer('damage_status')->default(1);
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
        Schema::dropIfExists('product_damages');
    }
}
