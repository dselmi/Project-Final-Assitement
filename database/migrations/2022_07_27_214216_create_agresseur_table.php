<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgresseurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agresseurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiche_id')->constrained();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('age')->nullable();
            $table->string('nationality')->nullable();
            $table->string('profession')->nullable();
            $table->string('level_instruction')->nullable();
            $table->string('relation')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('state')->nullable();
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
        Schema::dropIfExists('agresseur');
    }
}
