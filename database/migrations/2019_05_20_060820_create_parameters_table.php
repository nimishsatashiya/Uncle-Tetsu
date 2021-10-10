<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParametersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parameters', function(Blueprint $table)
		{
			$table->bigInteger('para_id')->default(0)->primary();
			$table->bigInteger('para_parent_id')->default(0);
			$table->string('para_value', 150)->nullable();
			$table->string('para_desc', 150)->nullable();
			$table->integer('para_sort_order')->nullable()->default(0);
			$table->text('para_tech_desc', 65535)->nullable();
			$table->timestamps();
			$table->bigInteger('created_by')->nullable()->default(0);
			$table->bigInteger('updated_by')->nullable()->default(0);
			$table->char('status', 1)->nullable()->default('A');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('parameters');
	}

}
