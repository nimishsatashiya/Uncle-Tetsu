<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMlsClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mls_class', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('mls_id');
			$table->string('class_name', 100);
			$table->integer('status')->default(0);
			$table->dateTime('last_import_date')->nullable();
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
		Schema::drop('mls_class');
	}

}
