<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationAdditionelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_additionels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiche_id')->constrained();
            $table->boolean('events_with_presence_children')->nullable();
            $table->boolean('check_children_victims_violence')->nullable();
            $table->string('which_ones')->nullable();
            $table->boolean('check_children_disturbed')->nullable();
            $table->boolean('check_other_witnesses')->nullable();
            $table->string('witnesses')->nullable();
            $table->boolean('check_responded_verbally_physically_to_attacker')->nullable();
            $table->string('agresser_has_abuser_alcohol_narcotics_medication_other')->nullable();
            $table->boolean('usually')->nullable();
            $table->boolean('only_during_violence')->nullable();
            $table->longText('attitude_after_violence')->nullable();
            $table->longText('check_afraid_and_of_what')->nullable();
            $table->longText('have_confided_and_check_witnesses')->nullable();
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
        Schema::dropIfExists('information_additionel');
    }
}
