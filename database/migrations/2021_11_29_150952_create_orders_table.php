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
            $table->integer('user_id');
            //holds serialized object
            $table->text('cart');
            $table->text('address');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->decimal('total',20, 2);
            $table->string('payment_method');
            $table->string('email');
            $table->enum('status', ['pending', 'cancelled', 'delivered', 'decline'])->default('delivered');
            $table->timestamps();





            // // ORDER DETAILS
            // $table->string('order_number')->unique();
            // $table->enum('status', ['pending', 'cancelled', 'completed', 'decline'])->default('pending');
            // $table->decimal('grand_total', 20, 6);
            // //QUANTITY
            // $table->unsignedInteger('item_count');

            // $table->boolean('payment_status')->default(1);
            // $table->string('payment_method')->nullable();

            // // USER INFO
            // $table->unsignedInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->string('first_name');
            // $table->string('last_name');
            // $table->text('address');
            // $table->string('phone_number');
            // $table->string('email');


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
