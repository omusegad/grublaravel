<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBackupDatabaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('backup_database', function(Blueprint $table)
		{
			$table->integer('iBackupId', true);
			$table->string('vFile');
			$table->enum('eType', array('Manual','Auto'))->default('Auto');
			$table->dateTime('dDate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('backup_database');
	}

}
