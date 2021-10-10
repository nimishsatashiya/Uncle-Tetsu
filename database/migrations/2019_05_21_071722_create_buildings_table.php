<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuildingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buildings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('building_name', 100)->nullable();
			$table->string('stories', 100)->nullable();
			$table->integer('year_built')->nullable();
			$table->integer('floor')->nullable();
			$table->string('pet_policy', 100)->nullable();
			$table->string('building_size', 100)->nullable();
			$table->string('building_type', 100)->nullable();
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
		Schema::drop('buildings');
	}

}
