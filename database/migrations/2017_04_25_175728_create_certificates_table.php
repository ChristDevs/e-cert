<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('person_id', false, true);
            $table->string('status', 10);
            $table->integer('auth_by', false, true);
            $table->timestamp('auth_on');
            $table->boolean('processed')->default(false);
            $table->integer('created_by', false, true);
            $table->integer('serial_number')->unique();
            $table->string('place_of_wedding');
            $table->string('overseen_by');
            $table->longText('notes');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('auth_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
