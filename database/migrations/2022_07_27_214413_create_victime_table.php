<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVictimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('victimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiche_id')->constrained();
            $table->enum('state',['Mariée','Divorcée','Veuve','Célibataire','Relation libre'])->nullable();
            $table->string('duration_state')->nullable();
            $table->string('nb_childrens')->nullable();
            $table->boolean('check_other_people')->nullable();
            $table->string('other_people')->nullable();
            $table->json('situation_victime')->nullable();
            $table->string('maladies')->nullable();
            $table->boolean('living_together_with_times_events')->nullable();
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
        Schema::dropIfExists('victimes');
    }
}
