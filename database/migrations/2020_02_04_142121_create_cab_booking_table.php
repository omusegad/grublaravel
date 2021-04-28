<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCabBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cab_booking', function(Blueprint $table)
		{
			$table->integer('iCabBookingId', true);
			$table->string('vBookingNo');
			$table->integer('iCompanyId')->default(1);
			$table->integer('iUserId')->comment('link with register_uesr table');
			$table->integer('iDriverId');
			$table->integer('iOrganizationId');
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
			$table->enum('ePayType', array('Cash','Card','Paypal','Organization'))->comment('payment type');
			$table->integer('iVehicleTypeId')->comment('vehicle type id - carx,y,z');
			$table->integer('iRentalPackageId')->comment('linked to rental_package table');
			$table->float('fPickUpPrice', 10, 0)->default(1);
			$table->float('fNightPrice', 10, 0)->default(1);
			$table->enum('eCancelBy', array('Driver','Rider','Admin'));
			$table->integer('iCancelByUserId');
			$table->dateTime('dCancelDate');
			$table->integer('iCancelReasonId')->default(0);
			$table->string('vFailReason', 200);
			$table->string('vCancelReason', 500);
			$table->enum('eType', array('Ride','Deliver','UberX','Multi-Delivery'));
			$table->integer('iPackageTypeId');
			$table->string('vReceiverName', 50);
			$table->string('vReceiverMobile', 50);
			$table->text('tPickUpIns', 65535);
			$table->text('tDeliveryIns', 65535);
			$table->text('tPackageDetails', 65535);
			$table->string('vCouponCode');
			$table->integer('iUserPetId')->default(0);
			$table->enum('eMessageSend', array('Yes','No'))->default('No');
			$table->enum('eMessageAdminOne', array('Yes','No'))->default('No');
			$table->enum('eMessageAdminTwo', array('Yes','No'))->default('No');
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
			$table->integer('iAdminId');
			$table->integer('iHotelBookingId')->comment('For Hotel Panel Web');
			$table->string('vRiderRoomNubmer');
			$table->enum('eBookingFrom', array('Admin','Hotel','Company','User',''))->default('');
			$table->enum('eWalletDebitAllow', array('Yes','No'))->default('Yes');
			$table->enum('ePaymentBy', array('Passenger','Organization'))->default('Passenger');
			$table->string('vProfileEmail', 500);
			$table->integer('iUserProfileId');
			$table->integer('iTripReasonId');
			$table->text('vReasonTitle', 65535);
			$table->enum('eTripReason', array('Yes','No'))->default('No');
			$table->float('fAirportPickupSurge', 10, 0);
			$table->float('fAirportDropoffSurge', 10, 0);
			$table->enum('eBookForSomeOneElse', array('Yes','No'))->default('No')->comment('Field is used for book for someone else');
			$table->string('vBookSomeOneName')->comment('Field is used for book for someone else');
			$table->string('vBookSomeOneNumber')->comment('Field is used for book for someone else');
			$table->enum('ePayWallet', array('Yes','No'))->default('No');
			$table->enum('eServiceLocation', array('Passanger','Driver'))->default('Passanger');
			$table->text('tVehicleTypeData', 65535);
			$table->text('tVehicleTypeFareData', 65535);
			$table->text('tTotalDuration', 65535);
			$table->text('tTotalDistance', 65535);
			$table->text('tEstimatedCharge', 65535);
			$table->text('tUserWalletBalance', 65535);
			$table->text('vWorkLocation', 65535)->comment('Only used for UberX. And will be linked to Driver');
			$table->text('vWorkLocationLatitude', 65535)->comment('Only used for UberX. And will be linked to Driver');
			$table->text('vWorkLocationLongitude', 65535)->comment('Only used for UberX. And will be linked to Driver');
			$table->enum('eSelectWorkLocation', array('Dynamic','Fixed'))->comment('Only used for UberX. And will be linked to Driver');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cab_booking');
	}

}
