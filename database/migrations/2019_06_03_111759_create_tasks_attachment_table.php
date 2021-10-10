<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks_attachment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tasks_attachment_id')->nullable();
            $table->foreign('tasks_attachment_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->string('name', 100)->nullable();
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
        Schema::dropIfExists('tasks_attachment');
        
    }
}
