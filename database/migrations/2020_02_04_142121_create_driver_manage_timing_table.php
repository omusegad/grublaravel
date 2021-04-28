<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverManageTimingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_manage_timing', function(Blueprint $table)
		{
			$table->integer('iDriverTimingId', true);
			$table->integer('iDriverId');
			$table->string('vDay', 200);
			$table->text('vAvailableTimes', 65535);
			$table->dateTime('dAddedDate');
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_manage_timing');
	}

}
