<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadAssignTo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_assign_to', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotness_level',100)->nullable();
            $table->string('tags',100)->nullable();
            $table->string('lead_source',100)->nullable();
            $table->string('status',50)->nullable();
            $table->string('contact_type',100)->nullable();
            $table->integer('contact_id')->unsigned()->nullable();
            $table->integer('assign_user_id')->unsigned()->nullable();
            $table->text('comment')->nullable();
            $table->string('last_action',100)->nullable();
            $table->timestamps();

            $table->foreign('assign_user_id')->references('id')
                    ->on('users')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');

            $table->foreign('contact_id')->references('id')
                    ->on('lead_contact_form')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_assign_to');
    }
}
