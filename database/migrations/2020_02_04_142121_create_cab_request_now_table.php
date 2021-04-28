<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCabRequestNowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cab_request_now', function(Blueprint $table)
		{
			$table->integer('iCabRequestId', true);
			$table->float('fAirportPickupSurge', 10, 0);
			$table->float('fAirportDropoffSurge', 10, 0);
			$table->integer('iCabBookingId')->default(0);
			$table->integer('iUserId')->comment('link with register_user table');
			$table->integer('iDriverId')->default(0);
			$table->integer('iOrganizationId');
			$table->integer('iHotelId');
			$table->text('tMsgCode', 65535);
			$table->integer('iTripId')->default(0)->comment('If status is \'Assign\'  trip table have entry of this ride');
			$table->enum('eStatus', array('Requesting','Cancelled','Complete'))->default('Requesting')->comment('Requesting - default; Cancelled- if user want to cancel; Complete - driver accepted the ride');
			$table->string('vSourceLatitude', 30)->comment('source lat');
			$table->string('vSourceLongitude', 30)->comment('source long');
			$table->text('tSourceAddress', 65535)->comment('pickup address');
			$table->string('vDestLatitude', 30)->comment('destination lat');
			$table->string('vDestLongitude', 30)->comment('destination long');
			$table->text('tDestAddress', 65535)->comment('destination address');
			$table->enum('ePayType', array('Cash','Card','Paypal','Organization'))->comment('payment type');
			$table->integer('iVehicleTypeId')->comment('linked to vehicle_type table');
			$table->integer('iRentalPackageId')->comment('link to rental_package table');
			$table->float('fPickUpPrice', 10, 0)->default(1)->comment('related to surge price');
			$table->float('fNightPrice', 10, 0)->default(1)->comment('related to surge price');
			$table->enum('eType', array('Ride','Deliver','UberX','Multi-Delivery'));
			$table->integer('iPackageTypeId');
			$table->string('vReceiverName', 50);
			$table->string('vReceiverMobile', 50);
			$table->text('tPickUpIns', 65535);
			$table->text('tDeliveryIns', 65535);
			$table->text('tPackageDetails', 65535);
			$table->string('vCouponCode');
			$table->integer('iQty')->default(1);
			$table->string('vRideCountry', 10);
			$table->float('fTollPrice', 10, 0)->default(0);
			$table->string('vTollPriceCurrencyCode', 300);
			$table->enum('eTollSkipped', array('Yes','No'))->default('No');
			$table->enum('eFemaleDriverRequest', array('Yes','No'))->default('No');
			$table->enum('eHandiCapAccessibility', array('Yes','No'))->default('No');
			$table->string('vTimeZone');
			$table->timestamp('dAddedDate')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ride now created date');
			$table->enum('eFromCronJob', array('Yes','No'))->default('No');
			$table->integer('iUserAddressId')->default(0);
			$table->text('tUserComment', 65535);
			$table->string('iTempTripDeliveryLocationId', 500)->comment('multi-delivery');
			$table->enum('ePaymentByReceiver', array('Yes','No'))->default('No')->comment('multi-delivery');
			$table->float('fDuration', 10, 0)->comment('multi-delivery');
			$table->float('fDistance', 10, 0)->comment('multi-delivery');
			$table->float('fTripGenerateFare', 10, 0)->comment('multi-delivery');
			$table->enum('eFlatTrip', array('Yes','No'))->default('No');
			$table->float('fFlatTripPrice', 10, 0)->default(0);
			$table->integer('iAirportLocationId')->default(0);
			$table->enum('eAirportLocation', array('Yes','No'))->default('No');
			$table->float('iFare', 10, 0)->default(0);
			$table->float('iBaseFare', 10, 0)->default(0);
			$table->float('fPricePerMin', 10, 0)->default(0);
			$table->float('fPricePerKM', 10, 0)->default(0);
			$table->float('fCommision', 10, 0)->default(0);
			$table->float('fSurgePriceDiff', 10, 0)->default(0);
			$table->float('fDiscount', 10, 0)->default(0);
			$table->string('vDiscount', 20);
			$table->float('fMinFareDiff', 10, 0)->default(0);
			$table->float('fWalletDebit', 10, 0)->default(0);
			$table->float('fTax1', 10, 0)->default(0);
			$table->float('fTax2', 10, 0)->default(0);
			$table->float('fTax1Percentage', 10, 0)->default(0);
			$table->float('fTax2Percentage', 10, 0)->default(0);
			$table->float('fOutStandingAmount', 10, 0)->default(0);
			$table->enum('eBookingFrom', array('Admin','Hotel','Kiosk','Company','User',''))->default('')->comment('For Hotel Panel Web');
			$table->integer('iHotelBookingId')->comment('For Hotel Panel Web');
			$table->enum('eWalletDebitAllow', array('Yes','No'))->default('Yes');
			$table->enum('eSystem', array('General','DeliverAll'))->default('General');
			$table->enum('ePaymentBy', array('Passenger','Organization'))->default('Passenger');
			$table->string('vProfileEmail', 500);
			$table->integer('iUserProfileId');
			$table->integer('iTripReasonId');
			$table->text('vReasonTitle', 65535);
			$table->enum('eTripReason', array('Yes','No'))->default('No');
			$table->enum('ePoolRide', array('Yes','No'))->default('No')->comment('Only for Pool Rides ');
			$table->integer('iPersonSize')->comment('Only for Pool Rides ');
			$table->enum('eBookForSomeOneElse', array('Yes','No'))->default('No');
			$table->string('vBookSomeOneName');
			$table->string('vBookSomeOneNumber', 50);
			$table->enum('ePayWallet', array('Yes','No'))->default('No');
			$table->enum('eServiceLocation', array('Passanger','Driver'))->default('Passanger');
			$table->text('tVehicleTypeData', 65535);
			$table->text('tVehicleTypeFareData', 65535);
			$table->text('tTotalDuration', 65535);
			$table->text('tTotalDistance', 65535);
			$table->text('tEstimatedCharge', 65535);
			$table->text('tUserWalletBalance', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cab_request_now');
	}

}
