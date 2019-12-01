<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_reviews', function (Blueprint $table) {
            //
            $table->integer('review_id',true);
            $table->integer('businesses_id')->length(11)->nullable();
            $table->string('review_string',100)->nullable();
            $table->text('review_url',0)->nullable();
            $table->string('review_text',200)->nullable();
            $table->integer('review_rating')->length(3)->nullable();
            $table->datetime('review_time_created',0)->nullable();
            $table->string('review_user_id',100)->nullable();
            $table->string('review_user_profile_url',150)->nullable();
            $table->string('review_user_image_url',150)->nullable();
            $table->string('review_user_name',100)->nullable();
            $table->timestamps();
            //$table->primary(['review_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('table_reviews', function (Blueprint $table) {
        //     //
        // });
         Schema::dropIfExists('table_reviews');
    }
}
