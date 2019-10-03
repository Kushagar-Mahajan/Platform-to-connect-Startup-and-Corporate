<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnnouncementTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sih_announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('description', 500);
            $table->char('type', 1); // 3 types - a(all) s(startups) c(corporates)
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sih_announcements_attachments', function(Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('announcement_id')->unsigned();
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
        Schema::dropIfExists('sih_announcements');
        Schema::dropIfExists('sih_announcements_attachments');
    }
}
