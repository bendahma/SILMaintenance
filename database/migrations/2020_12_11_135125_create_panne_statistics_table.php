<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanneStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panne_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('panne_id')->constrained();           
            $table->foreignId('machine_id')->constrained();           
            $table->foreignId('category_id')->constrained();
            $table->integer('anneePanne')->nullable();
            $table->integer('moisPanne')->nullable();
            $table->unsignedBigInteger('dureeRegelementInMinutes')->nullable();
            $table->integer('nbrPanne')->default(0);
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
        Schema::dropIfExists('panne_statistics');
    }
}
