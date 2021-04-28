<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderLaterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_later', function(Blueprint $table)
		{
			$table->integer('iCabBookingId', true);
			$table->string('vBookingNo');
			$table->integer('iCompanyId')->default(1);
			$table->integer('iUserId')->comment('link with register_uesr table');
			$table->integer('iDriverId');
			$table->string('vSourceLatitude', 30)->comment('source lat');
			$table->string('vSourceLongitude', 30)->comment('source long');
			$table->string('vDestLatitude', 30)->comment('destination lat');
			$table->string('vDestLongitude', 30)->comment('destination long');
			$table->integer('vDistance')->comment('in KMs');
			$table->integer('vDuration')->comment('in Minutes');
			$table->dateTime('dBooking_date')->comment('date and time where user want to ride');
			$table->text('vSourceAddresss', 65535)->comment('source address');
			$table->text('tDestAddress', 65535);
			$table->timestamp('dAddredDate')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ride later created date');
			$table->integer('iTripId')->comment('If status is \'Assign\'  trip table have entry of this ride');
			$table->enum('eStatus', array('Pending','Assign','Accepted','Declined','Failed','Cancel','Completed'))->default('Pending')->comment('Pending - default; cancel- if user want to cancel; Assign - driver select ride; Failed-no one availble/accept');
			$table->enum('ePayType', array('Cash','Card','Paypal'))->comment('payment type');
			$table->integer('iVehicleTypeId')->comment('vehicle type id - carx,y,z');
			$table->float('fPickUpPrice', 10, 0)->default(1);
			$table->float('fNightPrice', 10, 0)->default(1);
			$table->enum('eCancelBy', array('Driver','Rider','Admin'));
			$table->integer('iCancelByUserId');
			$table->dateTime('dCancelDate');
			$table->string('vFailReason', 200);
			$table->string('vCancelReason', 500);
			$table->enum('eType', array('Ride','Deliver','UberX'));
			$table->integer('iPackageTypeId');
			$table->string('vReceiverName', 50);
			$table->string('vReceiverMobile', 50);
			$table->text('tPickUpIns', 65535);
			$table->text('tDeliveryIns', 65535);
			$table->text('tPackageDetails', 65535);
			$table->string('vCouponCode');
			$table->integer('iUserPetId')->default(0);
			$table->enum('eMessageSend', array('Yes','No'))->default('No');
			$table->enum('eAutoAssign', array('Yes','No'))->default('No');
			$table->integer('iCronStage');
			$table->enum('eAssigned', array('Yes','No'))->default('No');
			$table->integer('iQty')->default(1);
			$table->float('fVisitFee', 10, 0)->default(0);
			$table->float('fMaterialFee', 10, 0)->default(0);
			$table->float('fMiscFee', 10, 0)->default(0);
			$table->float('fDriverDiscount', 10, 0)->default(0);
			$table->string('vRideCountry', 10);
			$table->float('fTollPrice', 10, 0)->default(0);
			$table->string('vTollPriceCurrencyCode', 300);
			$table->enum('eTollSkipped', array('Yes','No'))->default('No');
			$table->enum('eFemaleDriverRequest', array('Yes','No'))->default('No');
			$table->enum('eHandiCapAccessibility', array('Yes','No'))->default('No');
			$table->string('vTimeZone');
			$table->float('fWalletMinBalance', 10, 0)->default(0)->comment('for report purpose only,not in use till now');
			$table->float('fWalletBalance', 10, 0)->default(0)->comment('for report purpose only,not in use till now');
			$table->enum('eCommisionDeductEnable', array('Yes','No'))->default('No')->comment('for report purpose only,not in use till now');
			$table->integer('iUserAddressId')->default(0);
			$table->text('tUserComment', 65535);
			$table->string('iTempTripDeliveryLocationId', 500)->comment('multi-delivery');
			$table->enum('ePaymentByReceiver', array('Yes','No'))->default('No')->comment('multi-delivery');
			$table->float('fTripGenerateFare', 10, 0)->comment('multi-delivery');
			$table->enum('eCancelBySystem', array('Yes','No'))->default('No');
			$table->enum('eFlatTrip', array('Yes','No'))->default('No');
			$table->float('fFlatTripPrice', 10, 0)->default(0);
			$table->integer('iAirportLocationId')->default(0);
			$table->enum('eAirportLocation', array('Yes','No'))->default('No');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_later');
	}

}
