<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sir_name')->nullable();
            $table->timestamp('dob');
            $table->string('gender');
            $table->string('id_no')->nullable;
            $table->string('birth_place');
            $table->string('province_of_birth');
            $table->string('county_of_birth');
            $table->string('residence');
            $table->boolean('alive')->default(true);
            $table->string('name_of_father');
            $table->string('name_of_mother');
            $table->string('name_of_spouse');
            $table->text('cause_of_death');
            $table->boolean('married')->default(false);
            $table->string('relation');
            $table->string('spouse_id_no');
            $table->integer('user_id', false, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
