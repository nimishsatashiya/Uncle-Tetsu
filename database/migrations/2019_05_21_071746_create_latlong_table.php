<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLatlongTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('latlong', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('latitude', 100)->nullable();
			$table->string('longitude', 100)->nullable();
			$table->string('addressmd5', 100)->nullable();
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
		Schema::drop('latlong');
	}

}
