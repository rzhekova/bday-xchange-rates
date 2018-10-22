<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBirthdayExchangeRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birthday_exchange_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appears')->default(1);
            $table->string('date');
            $table->string('formatted_date');
            $table->text('exchange_rates')->defailt([]);
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
        Schema::dropIfExists('birthday_exchange_rates');
    }
}
