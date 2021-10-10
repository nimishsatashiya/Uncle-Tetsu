<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_type_id')->unsigned()->index('user_ibfk');
			$table->string('name', 191)->nullable();
			$table->string('firstname', 191)->nullable();
			$table->string('lastname', 191)->nullable();
			$table->string('email', 191)->nullable()->unique();
			$table->string('password', 191)->nullable();
			$table->string('address', 191)->nullable();
			$table->string('phone', 191)->nullable();
			$table->string('image', 191)->nullable();
			$table->integer('status')->nullable()->default(1);
			$table->string('slug', 191)->nullable();
			$table->timestamp('last_login_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
