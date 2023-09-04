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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('logo')->nullable();
            $table->string('contact_email', 30)->nullable();
            $table->string('contact_phone', 15)->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->text('terms')->nullable();
            $table->text('privacy_policy')->nullable();
            $table->string('discount_text')->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->integer('tax')->nullable();
            $table->string('currency', 10)->nullable();
            $table->string('iban')->nullable();
            $table->string('stripe_secret')->nullable();
            $table->string('stripe_key')->nullable();
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
        Schema::dropIfExists('site_settings');
    }
};
