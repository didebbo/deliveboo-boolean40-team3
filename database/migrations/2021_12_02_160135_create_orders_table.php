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
            $table->id();
            $table->timestamps(); //date
            $table->foreignId('user_id');
            $table->float('total_price', 6, 2)->unsigned();
            $table->tinyInteger('status')->unsigned();
            $table->string('customer_email');
            $table->string('customer_firstname', 50);
            $table->string('customer_lastname', 50);
            $table->string('customer_phone', 20);
            $table->string('customer_address', 150);
            $table->string('notes')->nullable();
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
