<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->bigIncrements('purchase_id');
            $table->integer('product_id');
            $table->integer('purchase_qunatity')->nullable();
            $table->string('purchase_unit_price')->nullable();
            $table->string('purchase_sub_price')->nullable();
            $table->string('purchase_discount')->nullable();
            $table->string('purchase_total_price')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('purchase_brand')->nullable();
            $table->string('purchase_supplier')->nullable();
            $table->string('purchase_chalan')->nullable();
            $table->string('purchase_voucher')->nullable();
            $table->string('purchase_slug')->nullable();
            $table->integer('purchase_creator')->nullable();
            $table->integer('purchase_status')->default(1);
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
        Schema::dropIfExists('product_purchases');
    }
}
