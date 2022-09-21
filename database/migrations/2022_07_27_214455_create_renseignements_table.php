<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenseignementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renseignements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiche_id')->constrained();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('nationality')->nullable();
            $table->string('profession')->nullable();
            $table->string('level_instruction')->nullable();
            $table->string('cin_passeport')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('delegation')->nullable();
            $table->string('governorate')->nullable();
            $table->string('ordered_by')->nullable();
            $table->string('place_residence')->nullable();
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
        Schema::dropIfExists('renseignements');
    }
}
