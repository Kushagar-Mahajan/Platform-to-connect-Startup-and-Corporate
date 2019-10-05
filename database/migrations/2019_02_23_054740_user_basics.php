<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserBasics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sih_users_basics', function (Blueprint $table) {
            $table->mediumInteger('user_id')->unsigned();
            $table->string('display_picture_url', 1000);
            $table->date('founded_on');
            $table->string('bio', 500);
            $table->text('additional_info');
            $table->string('tags', 500);
            $table->integer('ranking_score');
            $table->string('contact_email', 100);
            $table->string('contact_number', 15);
            $table->string('location', 100);
            $table->char('type', 1); // 3 types - a(admin) c(corporate) s(startup) 
        });

       Schema::create('sih_user_score_credit_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('description', 500);
            $table->string('verification_status', 1); // two values 0(not-verified) 1(verified)
            $table->string('verification', 1)->nullable(); // two values 0(false request) 1(true request)
            $table->mediumInteger('verifier_id'); // user that verifies (maybe to recheck his action )
            $table->dateTime('verified_at');
            $table->timestamp('created_at');
        });

        Schema::create('sih_user_score_credit_requests_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('users_score_credit_request_id')->unsigned();
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
        Schmea::dropIfExists('sih_users_basics');
        Schema::dropIfExists('sih_user_score_credit_requests');
        Schema::dropIfExists('sih_user_score_credit_requests_attachments');
    }
}
