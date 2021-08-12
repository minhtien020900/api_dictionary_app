<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PartOfSpeechables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('part_of_speechtables', function (Blueprint $table) {
            $table->id();
            $table->integer('part_of_speech_id');
            $table->integer('part_of_speech_able');
            $table->string('part_of_speech_able_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part_of_speechtables');
    }
}
