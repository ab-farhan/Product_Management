<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_distributions', function (Blueprint $table) {
            $table->bigIncrements('pd_id');
            $table->integer('user_id');
            $table->integer('pr_id');
            $table->integer('product_id');
            $table->integer('pd_code');
            $table->integer('pd_quantity');
            $table->integer('pd_chalan');
            $table->string('pd_remarks')->nullable();
            $table->integer('pd_creator')->nullable();
            $table->string('pd_slug',50)->nullable();
            $table->integer('pd_status')->default(1);
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
        Schema::dropIfExists('product_distributions');
    }
}
