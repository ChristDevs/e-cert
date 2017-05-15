<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign('certificates_auth_by_foreign');
            $table->dropColumn('notes', 'auth_by');
        });
        Schema::table('certificates', function (Blueprint $table) {
            $table->integer('auth_by', false, true)->nullable();
            $table->longText('notes')->nullable();

            $table->foreign('auth_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
        });
    }
}
