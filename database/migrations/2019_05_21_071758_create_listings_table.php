<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('mls_id');
			$table->string('mls_no', 100)->nullable();
			$table->string('mls_original_no', 100)->nullable();
			$table->string('city_id', 100);
			$table->string('state_id', 100)->nullable();
			$table->string('pincode', 100)->nullable();
			$table->string('address', 500)->nullable();
			$table->string('price', 100)->nullable();
			$table->string('bath', 100)->nullable();
			$table->integer('year_built')->nullable();
			$table->string('dom', 100)->nullable();
			$table->string('mls_type', 100)->nullable();
			$table->string('county', 100)->nullable();
			$table->string('agent_email', 100)->nullable();
			$table->string('agent_name', 100)->nullable();
			$table->string('floor_space', 100)->nullable();
			$table->string('balconies_space', 100)->nullable();
			$table->string('neighborhood_id', 100)->nullable();
			$table->string('number_of_balconies', 100)->nullable();
			$table->string('number_of_bedrooms', 100)->nullable();
			$table->string('number_of_garages', 100)->nullable();
			$table->string('number_of_parking_spaces', 100)->nullable();
			$table->string('pets_allowed', 100)->nullable();
			$table->string('description', 100)->nullable();
			$table->integer('status_id')->nullable();
			$table->integer('latlong_id')->nullable();
			$table->integer('building_id')->nullable();
			$table->dateTime('modified_time')->nullable();
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
		Schema::drop('listings');
	}

}
