<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('num');
            $table->integer('site_id')->unsigned();
            $table->string('site_name');
            $table->integer('product_id')->unsigned();
            $table->string('product_name');
            $table->string('product_code');
            $table->integer('quantity')->unsigned();
            $table->double('price');
            $table->double('sell_price');
            $table->double('total_price');
            $table->double('total_paid');
            $table->double('benefit')->default(0);
            $table->integer('client_id')->unsigned();
            $table->string('client_name');
            $table->integer('company_id')->unsigned()->nullable();
            $table->string('company_name')->nullable();
            $table->string('client_rcn')->nullable();
            $table->string('client_nif')->nullable();
            $table->string('client_tin')->nullable();
            $table->string('client_willaya')->nullable();
            $table->string('client_address')->nullable();
            $table->integer('driver_id')->unsigned();
            $table->string('driver_name');
            $table->string('driver_car_number');
            $table->date('date');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id')->unsigned();
            $table->double('paid');
            $table->text('note')->nullable();
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

        Schema::dropIfExists('payments');

        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
        
        Schema::dropIfExists('bills');
    }
}
