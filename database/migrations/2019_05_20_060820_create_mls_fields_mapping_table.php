<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMlsFieldsMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mls_fields_mapping', function(Blueprint $table)
		{
			$table->integer('mls_id');
			$table->string('db_field', 100);
			$table->string('api_field')->nullable();
			$table->timestamps();
			$table->primary(['mls_id','db_field']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mls_fields_mapping');
	}

}
