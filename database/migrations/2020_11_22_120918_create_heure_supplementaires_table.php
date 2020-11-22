<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeureSupplementairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heure_supplementaires', function (Blueprint $table) {
            $table->id();
            $table->date('Jour');
            $table->time('heurDebut')->default('00:00:00');
            $table->time('heurFin')->default('00:00:00');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('heure_supplementaires');
    }
}
