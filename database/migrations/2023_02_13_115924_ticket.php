<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->enum('priorite', ['haut','normal','faible'])->default('faible');
            $table->enum('etat', ['REÇU','EN COURS','EN ATTENTE','NE PAS TRAITER','TERMINÉ','CLÔTURÉ'])->default('REÇU');
            $table->date('created_at');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
