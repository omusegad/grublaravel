<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_permissions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('permission_name', 55);
			$table->enum('status', array('Active','Inactive','Deleted'))->default('Active');
			$table->integer('display_group_id');
			$table->integer('display_order');
			$table->string('vDispalyAppType')->default('All');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin_permissions');
	}

}
