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
            $table->text('approval_notes')->nullable();
            $table->text('process_notes')->nullable();
            $table->longText('notes')->nullable();

            $table->foreign('auth_by')->references('id')->on('users')->onDelete('set null');
        });
        Schema::table('people', function (Blueprint $table) {
            $table->integer('user_id', false, true)->nullable();
            $table->string('marital_status', 15)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('phone', 60)->nullable();
            $table->string('mobile', 60)->nullable();
            $table->string('street', 60)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('zip', 60)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropForeign('people_user_id_foreign');
            $table->dropColumn('marital_status', 'user_id', 'email', 'phone', 'mobile', 'street', 'zip', 'city');
        });
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn('approval_notes', 'process_notes');
        });
    }
}
