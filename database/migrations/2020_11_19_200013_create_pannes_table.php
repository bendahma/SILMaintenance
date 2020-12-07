<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePannesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pannes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demande_travail_id')->constrained();
            $table->foreignId('machine_id')->constrained();
            $table->foreignId('mark_id')->constrained();
            $table->dateTime('dateSortie')->nullable();
            $table->unsignedBigInteger('reglePar')->nullable();
            $table->foreign('reglePar')->references('id')->on('users');
            $table->boolean('panneRegle')->default(false);
            $table->text('travailFait')->nullable();
            $table->integer('dureeRegelementMinute')->nullable();
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
        Schema::dropIfExists('pannes');
    }
}
