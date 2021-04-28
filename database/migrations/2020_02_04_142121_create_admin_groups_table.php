<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_groups', function(Blueprint $table)
		{
			$table->integer('iGroupId', true);
			$table->string('vGroup');
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin_groups');
	}

}
