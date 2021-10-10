<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewfieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('interests', 512)->nullable();
            $table->string('occupation', 512)->nullable();
            $table->text('about')->nullable();
            $table->string('website_url', 512)->nullable();
            $table->integer('privacy_1')->comment('1 - Yes, 0 - No')->default(0)->nullable();
            $table->integer('privacy_2')->comment('1 - Yes, 0 - No')->default(0)->nullable();
            $table->integer('privacy_3')->comment('1 - Yes, 0 - No')->default(0)->nullable();
            $table->integer('privacy_4')->comment('1 - Yes, 0 - No')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
