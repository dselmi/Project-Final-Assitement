<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiche_id')->constrained();
            $table->enum('violence_type',['psychologique','harcelement','verbale','economique','physique','sexuelle']);
            $table->enum('times',['jour','semaine','mois'])->nullable();
            $table->string('lieu')->nullable();
            $table->date('when')->nullable();
            $table->json('who')->nullable();
            $table->json('type_dommage')->nullable();
            $table->json('type')->nullable();
            $table->json('violence_using')->nullable();
            $table->longText('other')->nullable();
            $table->boolean('breakage_objects')->nullable();
            $table->boolean('makes_threats_against_other_people')->nullable();
            $table->longText('which_ones')->nullable();
            $table->boolean('victim_not_consensual_sexuality')->nullable();
            $table->boolean('accompanied_physical_brutality_threats')->nullable();
            $table->boolean('forced_undergo_pornographic_scenarios')->nullable();
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
        Schema::dropIfExists('violences');
    }
}
