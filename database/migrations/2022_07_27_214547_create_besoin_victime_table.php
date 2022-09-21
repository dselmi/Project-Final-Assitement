<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBesoinVictimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('besoin_victimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiche_id')->constrained();
            $table->boolean('medical_follow')->nullable();
            $table->boolean('social_follow')->nullable();
            $table->boolean('psychological_follow')->nullable();
            $table->boolean('legal_follow')->nullable();
            $table->longText('other_needs')->nullable();
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
        Schema::dropIfExists('besoin_victimes');
    }
}
