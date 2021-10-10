<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMlsFieldsMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mls_fields_mapping', function(Blueprint $table)
        {
             $table->Integer('mls_class_id')->after('mls_id');
             $table->dropPrimary(['mls_id', 'db_field']);
             $table->primary(['mls_id', 'mls_class_id', 'db_field']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
