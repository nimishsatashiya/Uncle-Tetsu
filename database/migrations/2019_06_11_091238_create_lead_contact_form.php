<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadContactForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_contact_form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 191)->nullable();
            $table->string('lastname', 191)->nullable();
            $table->string('email', 191)->nullable()->unique();
            $table->string('mobile_number', 20)->nullable();
            $table->string('home_number', 20)->nullable();
            $table->string('office_number', 20)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('company')->nullable();
            $table->text('address')->nullable();
            $table->string('spouse_name',191)->nullable();
            $table->string('spouse_email',191)->nullable();
            $table->date('spouse_birth_date')->nullable();
            $table->string('spouse_phone',20)->nullable();
            $table->string('last_action',100)->nullable();
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
        Schema::dropIfExists('lead_contact_form');
    }
}
