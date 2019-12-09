<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->default(0);
            $table->float('total')->nullable();
            $table->time('time')->nullable();
            $table->dateTime('order_date')->nullable();
            $table->dateTime('deliver_date')->nullable();
            $table->string('payment');
            $table->string('remarks')->nullable();
            $table->integer('user_id');
            $table->integer('delivery_id')->nullable();
            $table->integer('occasion_id');
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
        Schema::dropIfExists('orders');
    }
}
