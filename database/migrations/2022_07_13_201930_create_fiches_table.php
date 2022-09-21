<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->enum('type',['ecoute','acceuil','consultation','garde']);
            $table->date('date')->nullable();
            $table->string('lieu')->nullable();
            $table->string('femme')->nullable();
            $table->date('naissance')->nullable();
            $table->string('etat_civil')->nullable();
            $table->string('adresse')->nullable();
            $table->string('oriente_par')->nullable();
            $table->longText('motif_visite')->nullable();
            $table->longText('agresseur')->nullable();
            $table->longText('type_violence')->nullable();
            $table->boolean('fils_victimes')->nullable();
            $table->string('etapes')->nullable();
            $table->string('decision')->nullable();
            $table->longText('activities')->nullable();
            $table->longText('demande')->nullable();
            $table->string('seance_num')->nullable();
            $table->longText('rapport')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('fiches');
    }
}
