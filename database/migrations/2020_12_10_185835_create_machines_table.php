<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation')->unique();
            $table->string('numeroSerie')->nullable();
            $table->foreignId('type_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->text('obs')->nullable();
            $table->string('model')->nullable();
            $table->string('dateMiseEnService')->nullable();
            $table->string('typeField')->nullable();
            $table->string('markMoteur')->nullable();
            $table->string('typeMoteur')->nullable();
            $table->string('markTransmission')->nullable();
            $table->string('typeTransmission')->nullable();
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
        Schema::dropIfExists('machines');
    }
}
