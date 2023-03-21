<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('discount_text');
            $table->integer('discount');
            $table->integer('delivery_charges');
            $table->integer('tax_charges');
            $table->integer('currency_multiplier');
            $table->string('iban');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('instagram');
            $table->string('facebook');
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
        Schema::dropIfExists('sites');
    }
};
