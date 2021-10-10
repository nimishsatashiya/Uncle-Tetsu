<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListingAmenitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listing_amenities', function(Blueprint $table)
		{
			$table->integer('listing_id');
			$table->integer('amenities_id');
			$table->timestamps();
			$table->primary(['listing_id','amenities_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('listing_amenities');
	}

}
