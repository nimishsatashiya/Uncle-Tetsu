<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAdminUserRightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('admin_user_rights', function(Blueprint $table)
		{
			$table->foreign('user_type_id', 'admin_user_rights_ibfk_1')->references('id')->on('user_types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('admin_user_rights', function(Blueprint $table)
		{
			$table->dropForeign('admin_user_rights_ibfk_1');
		});
	}

}
