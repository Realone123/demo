<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaystackAndMolliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paystack_and_mollies', function (Blueprint $table) {
            $table->id();
            $table->string('mollie_key');
            $table->integer('mollie_status')->default(0);
            $table->integer('mollie_currency_rate')->default(0);
            $table->integer('mollie_country_code')->default(0);
            $table->integer('mollie_currency_code')->default(0);
            $table->string('paystact_public_key');
            $table->string('paystact_secret_key');
            $table->string('paystack_currency_rate');
            $table->integer('paystack_country_code')->default(0);
            $table->integer('paystack_currency_code')->default(0);
            $table->integer('paystack_status')->default(0);
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
        Schema::dropIfExists('paystack_and_mollies');
    }
}
