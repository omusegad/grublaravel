<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('location_master', function(Blueprint $table)
		{
			$table->integer('iLocationId', true);
			$table->integer('iCountryId');
			$table->string('vLocationName', 500);
			$table->text('tLatitude', 65535);
			$table->text('tLongitude', 65535);
			$table->enum('eStatus', array('Active','Inactive'));
			$table->enum('eFor', array('Restrict','VehicleType'))->default('Restrict');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('location_master');
	}

}
