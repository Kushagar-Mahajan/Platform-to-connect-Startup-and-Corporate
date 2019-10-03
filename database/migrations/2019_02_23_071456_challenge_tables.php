<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChallengeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sih_challenge_statememts', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('creator_id')->unsigned();
            $table->string('title', 100);
            $table->string('description', 500);
            $table->string('display_picture_url', 1000);
            $table->text('additional_info');
            $table->string('status', 1); // 2 types - 0(inactive) 1(active)  
            $table->string('tags', 500);
            $table->integer('ranking_score');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sih_challenge_statements_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('challenge_statement_id')->unsigned();
            $table->mediumInteger('creator_id')->unsigned();
            $table->text('comment');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sih_challenge_statments_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('challenge_statement_id')->unsigned();
            $table->string('attachment_url', 1000);
        });

        Schema::create('sih_challenge_statement_reponses', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('challenge_statement_id')->unsigned();
            $table->mediumInteger('creator_id')->unsigned();
            $table->string('title', 100);
            $table->string('description', 500);
            $table->timestamp('created_at');
        }); 

        Schema::create('sih_challenge_statment_response_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('challenge_statement_response_id')->unsigned();
            $table->string('attachment_url', 1000);
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sih_challenge_statememts');
        Schema::dropIfExists('sih_challenge_statements_comments');
        Schema::dropIfExists('sih_challenge_statments_attachments');
        Schema::dropIfExists('sih_challenge_statement_reponses');
        Schema::dropIfExists('sih_challenge_statment_response_attachments');
    }
}
