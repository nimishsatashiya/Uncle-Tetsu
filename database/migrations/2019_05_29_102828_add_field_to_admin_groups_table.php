<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToAdminGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_groups', function (Blueprint $table) {
            $table->integer('admin_group_titles_id')->index('admin_group_titles_id');
            $table->char('is_sub_menu', 1)->default('Y')->nullable();
            $table->string('url', 512)->nullable();
            $table->char('show_in_menu', 1)->default('Y')->nullable();
            $table->enum('link_type',["0","1"])->comment('1 - Internal, 0 - External')->default("1");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_groups', function (Blueprint $table) {
            //
        });
    }
}
