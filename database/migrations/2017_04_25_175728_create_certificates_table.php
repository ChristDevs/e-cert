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
            $table->integer('person_id', true, true);
            $table->string('status', 10);
            $table->integer('auth_by', false, true)->nullable();
            $table->timestamp('auth_on')->nullable();
            $table->boolean('processed')->default(false);
            $table->integer('created_by', false, true)->nullable();
            $table->string('serial_number')->nullable();
            $table->string('place_of_wedding')->nullable();
            $table->string('overseen_by')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('auth_by')->references('id')->on('users')->onDelete('set null');
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
