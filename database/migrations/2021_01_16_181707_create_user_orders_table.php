<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',100);
            $table->integer('ref_no');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('total_price');
            $table->tinyInteger('orderStatus')->default('1');
            $table->integer('discount');
            $table->string('user_name',50);
            $table->string('user_mobile',50);
            $table->string('user_email',50);
            $table->string('user_address',100);
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
        Schema::dropIfExists('user_orders');
    }
}
