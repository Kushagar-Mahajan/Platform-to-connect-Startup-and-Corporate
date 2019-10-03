<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VotingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sih_scoring', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('description', 500);
            $table->tinyInteger('points');
        });

        Schema::create('sih_challenge_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('creator_id')->unsigned();
            $table->mediumInteger('voted_challenge_id')->unsigned();
            $table->smallInteger('points');
            $table->timestamp('created_at');
        }); 

        Schema::create('sih_idea_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('creator_id')->unsigned();
            $table->mediumInteger('voted_idea_id')->unsigned();
            $table->smallInteger('points'); // maximum points (100)
            $table->timestamp('created_at');
            });

        Schema::create('sih_user_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('creator_id')->unsigned();
            $table->mediumInteger('voted_user_id')->unsigned();
            $table->smallInteger('points'); // maximum points (100)
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sih_scoring');
        Schema::dropIfExists('sih_challenge_scores');
        Schema::dropIfExists('sih_idea_scores');
        Schmea::dropIfExists('sih_user_scores');
    }
}
