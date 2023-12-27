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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nationality_id')->index();
            $table->string('identification_card');
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->unsignedBigInteger('category_id')->index();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('postcode');
            $table->unsignedBigInteger('state_id')->index();
            $table->unsignedBigInteger('country_id')->index();
            $table->string('contact');
            $table->string('email');
            $table->string('tshirt_size');
            $table->string('finisher_size');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact');
            $table->string('medical_condition');
            $table->unsignedBigInteger('event_id')->index();
            $table->timestamps();

            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
};
