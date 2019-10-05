<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IdeaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sih_ideas', function (Blueprint $table) {
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

        Schema::create('sih_idea_progress_log', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('idea_id')->unsigned();
            $table->mediumInteger('creator_id')->unsigned();
            $table->string('title', 100);
            $table->string('description', 500);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sih_ideas_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('idea_id')->unsigned();
            $table->mediumInteger('creator_id')->unsigned();
            $table->text('comment');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sih_ideas_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('idea_id')->unsigned();
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
        Schema::dropIfExists('sih_ideas');
        Schema::dropIfExists('sih_idea_progress_log');
        Schema::dropIfExists('sih_ideas_comments');
        Schema::dropIfExists('sih_ideas_attachments');
    }
}
