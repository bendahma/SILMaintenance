<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPanneIdToDemandeTravailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demande_travails', function (Blueprint $table) {
            $table->unsignedBigInteger('panne_id')->nullable();
            $table->foreign('panne_id')->references('id')->on('pannes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demande_travails', function (Blueprint $table) {
            //
        });
    }
}
