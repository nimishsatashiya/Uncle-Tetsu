<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkTypeToAdminGroupPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_group_pages', function (Blueprint $table) {
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
        Schema::table('admin_group_pages', function (Blueprint $table) {
            //
        });
    }
}
