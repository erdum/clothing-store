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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('country', 30);
            $table->string('city', 30);
            $table->string('state', 30)->nullable();
            $table->text('address');
            $table->string('postal_code', 10);
            $table->string('phone_number', 20)->unique();
            $table->string('card_number', 30)->unique()->nullable();
            $table->string('name_on_card', 30)->nullable();
            $table->string('card_expiry', 30)->nullable();
            $table->string('cvc', 10)->nullable();
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
        Schema::dropIfExists('shipping_addresses');
    }
};
