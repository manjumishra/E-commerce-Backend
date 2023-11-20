<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_order_details', function (Blueprint $table) {
            $table->id();
            $table->string('useremail');
            $table->integer('product_id');
            $table->decimal('price');
            $table->integer('quantity');
            $table->string('usedcoupon');
            $table->integer('total');
            $table->string('productname');
            $table->string('payment_mode');
            $table->string('status');
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
        Schema::dropIfExists('user_order_details');
    }
}
