<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_type', function(Blueprint $table)
		{
			$table->integer('iVehicleTypeId', true);
			$table->integer('iVehicleCategoryId')->default(0);
			$table->integer('iLocationid')->default(-1);
			$table->integer('iCountryId')->default(-1);
			$table->integer('iStateId')->default(-1);
			$table->integer('iCityId')->default(-1);
			$table->string('vAddress');
			$table->string('vVehicleType', 100)->comment('name of car type - carx, cargo');
			$table->string('vVehicleType_EN', 50);
			$table->string('vVehicleType_FR', 50);
			$table->string('vVehicleType_SW', 50);
			$table->string('vVehicleType_ES', 50);
			$table->string('vVehicleType_DE', 50);
			$table->string('vRentalAlias_EN', 50);
			$table->string('vRentalAlias_FR', 50);
			$table->string('vRentalAlias_SW', 50);
			$table->string('vRentalAlias_ES', 50);
			$table->string('vRentalAlias_DE', 50);
			$table->enum('eFareType', array('Regular','Fixed','Hourly'))->default('Fixed');
			$table->float('fFixedFare', 10, 0);
			$table->float('fPricePerKM', 10, 0)->comment('price per KM');
			$table->float('fPricePerMin', 10, 0)->comment('price per Minute');
			$table->float('fPricePerHour', 10, 0);
			$table->float('fMinHour', 10, 0);
			$table->float('fTimeSlot', 10, 0);
			$table->float('fTimeSlotPrice', 10, 0);
			$table->float('iBaseFare', 10, 0);
			$table->float('fCommision', 10, 0);
			$table->float('iMinFare', 10, 0);
			$table->float('fPickUpPrice', 10, 0)->default(1);
			$table->float('fNightPrice', 10, 0)->default(1);
			$table->enum('ePickStatus', array('Active','Inactive'))->default('Inactive');
			$table->enum('eNightStatus', array('Active','Inactive'))->default('Inactive');
			$table->time('tPickStartTime');
			$table->time('tPickEndTime');
			$table->time('tNightStartTime');
			$table->time('tNightEndTime');
			$table->integer('iPersonSize')->default(4);
			$table->string('vLogo', 100);
			$table->string('vLogo1', 100);
			$table->enum('eType', array('Ride','Deliver','UberX','DeliverAll'))->default('UberX');
			$table->enum('eIconType', array('Car','Bike','Cycle','Truck'))->default('Car');
			$table->time('tMonPickStartTime');
			$table->time('tMonPickEndTime');
			$table->float('fMonPickUpPrice', 10, 0)->default(1);
			$table->time('tTuePickStartTime');
			$table->time('tTuePickEndTime');
			$table->float('fTuePickUpPrice', 10, 0)->default(1);
			$table->time('tWedPickStartTime');
			$table->time('tWedPickEndTime');
			$table->float('fWedPickUpPrice', 10, 0)->default(1);
			$table->time('tThuPickStartTime');
			$table->time('tThuPickEndTime');
			$table->float('fThuPickUpPrice', 10, 0)->default(1);
			$table->time('tFriPickStartTime');
			$table->time('tFriPickEndTime');
			$table->float('fFriPickUpPrice', 10, 0)->default(1);
			$table->time('tSatPickStartTime');
			$table->time('tSatPickEndTime');
			$table->float('fSatPickUpPrice', 10, 0)->default(1);
			$table->time('tSunPickStartTime');
			$table->time('tSunPickEndTime');
			$table->float('fSunPickUpPrice', 10, 0)->default(1);
			$table->text('tNightSurgeData', 65535)->comment('This field must contains a json format data of day wise surge charge with start/end time.');
			$table->enum('eAllowQty', array('Yes','No'))->default('No');
			$table->integer('iMaxQty')->default(1);
			$table->float('fVisitFee', 10, 0);
			$table->float('fCancellationFare', 10, 0)->default(0);
			$table->integer('iCancellationTimeLimit');
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
			$table->float('fWaitingFees', 10, 0)->default(0);
			$table->integer('iWaitingFeeTimeLimit');
			$table->integer('iDisplayOrder')->default(1);
			$table->float('fRadius', 10, 0);
			$table->float('fDeliveryCharge', 10, 0)->default(0);
			$table->float('fDeliveryChargeCancelOrder', 10, 0)->default(0);
			$table->float('fPoolPercentage', 10)->default(0.00);
			$table->float('fTripHoldFees', 10)->default(0.00);
			$table->enum('ePoolStatus', array('Yes','No'))->default('No');
			$table->text('tTypeDesc', 65535)->comment('Used for Other Services.');
			$table->enum('eDeliveryType', array('','Single','Multi'))->default('')->comment('This field is only for delivery vehicle types. This is just for identification between single delivery vehicle types and multi delivery vehicle types.');
			$table->float('fBufferAmount', 10)->default(0.00)->comment('This field is applicable for  different payment methods. This is used when user is requesting a service.');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_type');
	}

}
