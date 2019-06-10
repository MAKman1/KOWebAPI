<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserChallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_challenge', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id');
            $table->integer('challenge_id');
            $table->integer('creator_id');

            $table->boolean('is_challenge_accepted')->default(0);
            $table->integer('token_placed')->default(0);

            $table->boolean('is_user_joker')->default(0);
            $table->boolean('is_joker_accepted')->default(0);

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
        Schema::dropIfExists('user_challenge');
    }
}
