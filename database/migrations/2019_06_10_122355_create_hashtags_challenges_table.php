<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashtagsChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hashtags_challenges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('challenge_id');
            $table->integer('hashtag_id');
            $table->timestamps();

            $table->foreign('challenge_id')
            ->references('id')
            ->on('challenge');

            $table->foreign('hashtag_id')
            ->references('id')
            ->on('hashtags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hashtags_challenges');
    }
}
