<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visit_address', function(Blueprint $table)
		{
			$table->integer('iVisitId', true);
			$table->string('vSourceLatitude');
			$table->string('vSourceLongitude');
			$table->string('vDestLatitude');
			$table->string('vDestLongitude');
			$table->text('vSourceAddresss', 65535);
			$table->text('tDestAddress', 65535);
			$table->text('tDestLocationName', 65535);
			$table->integer('iDisplayOrder');
			$table->integer('iHotelId');
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visit_address');
	}

}
