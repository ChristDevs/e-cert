<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWitnessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->integer('groom_id')->nullable()->unsigned();
            $table->integer('bride_id')->nullable()->unsigned();

            $table->foreign('groom_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('bride_id')->references('id')->on('people')->onDelete('cascade');
        });
        Schema::create('witnesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('id_no', 12);
            $table->integer('certificate_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('witnesses');

        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign('certificates_groom_id_foreign');
            $table->dropForeign('certificates_bride_id_foreign');
            
            $table->dropColumn('bride_id', 'groom_id');
        });
    }
}
