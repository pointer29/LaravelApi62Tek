<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_category', function (Blueprint $table) {
            //
            $table->integer('category_id',true);
            $table->integer('businesses_id')->length(11)->nullable();
            $table->string('category_alias',50)->nullable();
            $table->string('category_tittle',50)->nullable();
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
        // Schema::table('table_category', function (Blueprint $table) {
        //     //
        // });
        Schema::dropIfExists('table_category');
    }
}
