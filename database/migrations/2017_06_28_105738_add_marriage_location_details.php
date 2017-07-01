<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMarriageLocationDetails extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->string('overseer_position')->nullable();
            $table->string('event_location')->nullable();
            $table->text('data')->nullable();
            $table->timestamp('proccessed_on')->nullable();
        });
        Schema::table('people', function (Blueprint $table) {
            $table->timestamp('died_on')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn(['overseer_position', 'proccessed_on', 'event_location', 'data']);
        });
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn(['died_on']);
        });
    }
}
