<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_requisitions', function (Blueprint $table) {
            $table->bigIncrements('pr_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('pr_code',30)->unique();
            $table->integer('pr_quantity')->nullable();
            $table->string('pr_remarks')->nullable();
            $table->string('pr_slug',50)->nullable();
            $table->integer('pr_requisition_status')->default(0);
            $table->integer('pr_status')->default(1);
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
        Schema::dropIfExists('product_requisitions');
    }
}
