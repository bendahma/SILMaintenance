<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeTravailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_travails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_id')->constrained();
            $table->dateTime('dateEntre');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('declarePar');
            $table->foreign('declarePar')->references('id')->on('users');
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
        Schema::dropIfExists('demande_travails');
    }
}
