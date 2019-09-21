<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function($table) {
            $table->double('budget')->default(0);
        });

        Schema::table('products', function($table) {
            $table->double('sell_price')->default(0);
        });
        Schema::table('drivers', function($table) {
            $table->string('car_model')->nullable();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('rcn')->nullable();
            $table->string('nif')->nullable();
            $table->string('tin')->nullable();
            $table->string('willaya')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('tel')->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->string('willaya')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });

        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('budget')->default(0);
            $table->double('capital')->default(0);
            $table->double('benefit')->default(0);
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
        Schema::dropIfExists('accounts');

        Schema::dropIfExists('companies');

        Schema::dropIfExists('clients');

        Schema::table('drivers', function($table) {
            $table->dropColumn('car_model');
        });

        Schema::table('products', function($table) {
            $table->dropColumn('sell_price');
        });

        Schema::table('sites', function($table) {
            $table->dropColumn('budget');
        });

    }
}
