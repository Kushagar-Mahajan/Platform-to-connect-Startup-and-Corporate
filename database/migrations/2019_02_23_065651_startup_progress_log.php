<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StartupProgressLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sih_startup_progress_log', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('startup_user_id')->unsigned();
            $table->string('title', 100);
            $table->string('description', 500);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sih_startup_progress_log');
    }
}
