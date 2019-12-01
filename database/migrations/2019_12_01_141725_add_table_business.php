<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_business', function (Blueprint $table) {
            //
            $table->integer('businesses_id',true);
            $table->string('businesses_string',50)->nullable();
            $table->string('businesses_alias',100)->nullable();
            $table->string('businesses_name',50)->nullable();
            $table->text('businesses_image_url',0)->nullable();
            $table->tinyInteger('businesses_is_closed')->length(1)->nullable();
            $table->longText('businesses_url',0)->nullable();
            $table->integer('businesses_review_count')->length(5)->nullable();
            $table->decimal('businesses_rating')->decimals(5)->nullable();
            $table->string('businesses_transactions',255)->nullable();
            $table->string('businesses_coordinates_lat',15)->nullable();
            $table->string('businesses_coordinates_long',15)->nullable();
            $table->string('businesses_loc_address1',100)->nullable();
            $table->string('businesses_loc_address2',100)->nullable();
            $table->string('businesses_loc_address3',100)->nullable();
            $table->string('businesses_loc_city',50)->nullable();
            $table->string('businesses_loc_zip_code',10)->nullable();
            $table->string('businesses_loc_country',5)->nullable();
            $table->string('businesses_loc_state',5)->nullable();
            $table->string('businesses_display_address',100)->nullable();
            $table->string('businesses_phone',20)->nullable();
            $table->string('businesses_display_phone',20)->nullable();
            $table->decimal('businesses_distance')->length(5)->nullable();
            $table->tinyInteger('businesses_isreviews')->length(1)->nullable();
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
        // Schema::table('table_business', function (Blueprint $table) {
        //     //
        // });
        Schema::dropIfExists('table_business');
    }
}
