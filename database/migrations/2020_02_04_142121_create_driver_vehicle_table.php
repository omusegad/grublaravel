<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverVehicleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_vehicle', function(Blueprint $table)
		{
			$table->integer('iDriverVehicleId', true)->comment('unique id');
			$table->integer('iDriverId')->comment('link with registration_driver_details');
			$table->integer('iCompanyId');
			$table->integer('iMakeId');
			$table->integer('iModelId');
			$table->integer('iYear');
			$table->string('vLicencePlate', 100)->comment('licence number details');
			$table->string('vColour', 100);
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Inactive');
			$table->string('vInsurance');
			$table->string('vPermit');
			$table->string('vRegisteration');
			$table->enum('eCarX', array('Yes','No'));
			$table->enum('eCarGo', array('Yes','No'));
			$table->text('vCarType')->comment('link with vehicle_type');
			$table->text('vRentalCarType')->comment('link with rental_package');
			$table->enum('eHandiCapAccessibility', array('Yes','No'))->default('No');
			$table->enum('eType', array('Ride','Delivery','UberX'))->default('Ride');
			$table->enum('eAddedDeliverVehicle', array('Yes','No'))->default('No');
			$table->enum('eChildSeatAvailable', array('Yes','No'))->default('No');
			$table->enum('eWheelChairAvailable', array('Yes','No'))->default('No');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_vehicle');
	}

}
