<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogFileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_file', function(Blueprint $table)
		{
			$table->integer('iLogId', true);
			$table->string('vLogName', 100);
			$table->dateTime('tDate');
			$table->integer('iCompanyId')->default(0);
			$table->integer('iDriverId')->default(0);
			$table->enum('eUserType', array('driver','company'));
			$table->enum('eType', array('licence','noc','certificate','insurance','permit','registeration'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('log_file');
	}

}
