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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('status');
            $table->foreignId('shipping_address_id')->constrained();
            $table->integer('sub_total');
            $table->integer('total');
            $table->integer('discount');
            $table->string('discount_text');
            $table->integer('tax');
            $table->integer('delivery_charges');
            $table->string('payment_method', 30);
            $table->string('payment_id');
            $table->string('shipping_method', 30);
            $table->string('shipping_eta', 10);
            $table->text('tracking_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
};
