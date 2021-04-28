<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminPermissionDisplayGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_permission_display_groups', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 55);
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
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
		Schema::drop('admin_permission_display_groups');
	}

}
