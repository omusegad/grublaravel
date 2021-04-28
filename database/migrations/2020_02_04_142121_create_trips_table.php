<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trips', function(Blueprint $table)
		{
			$table->integer('iTripId', true)->comment('unique auto increment id');
			$table->string('vRideNo', 100);
			$table->integer('iUserId')->comment('Link with register_info');
			$table->integer('iDriverId')->comment('Link with registration_driver_detail');
			$table->integer('iCompanyId');
			$table->integer('iOrderId');
			$table->integer('iServiceId');
			$table->integer('iOrganizationId');
			$table->float('fDeliveryCharge', 10, 0)->default(0);
			$table->integer('iHotelId');
			$table->timestamp('tTripRequestDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('tDriverArrivedDate');
			$table->dateTime('tStartDate')->default('0000-00-00 00:00:00');
			$table->dateTime('tEndDate')->default('0000-00-00 00:00:00');
			$table->integer('iDriverVehicleId')->comment('Link with driver_vehicle');
			$table->text('tStartLat', 65535);
			$table->text('tStartLong', 65535);
			$table->text('tEndLat', 65535);
			$table->text('tEndLong', 65535);
			$table->text('tSaddress', 65535);
			$table->text('tDaddress', 65535);
			$table->float('iFare', 10, 0);
			$table->float('fPricePerKM', 10, 0)->comment('link with vehicle_type');
			$table->float('iBaseFare', 10, 0);
			$table->float('fPricePerMin', 10, 0)->default(1.5)->comment('link with vehicle_type');
			$table->float('fCommision', 10, 0);
			$table->float('fKioskHotelCommision', 10, 0);
			$table->float('fDistance', 10, 0)->nullable()->default(0);
			$table->float('fDuration', 10, 0);
			$table->enum('iActive', array('Active','Canceled','Finished','On Going Trip','Arrived'))->comment('Active,On Going Trip, Finished, Canceled ');
			$table->integer('iVerificationCode');
			$table->enum('eVerified', array('Verified','Not Verified'))->default('Not Verified');
			$table->enum('eCarType', array('CarX','CarGo'));
			$table->integer('iVehicleTypeId')->comment('link with vehicle_type');
			$table->integer('iRentalPackageId')->comment('linked to rental_package table');
			$table->float('fPickUpPrice', 10, 0)->default(1);
			$table->float('fNightPrice', 10, 0)->default(1);
			$table->enum('vTripPaymentMode', array('Cash','Paypal','Card','Organization'));
			$table->string('vCurrencyPassenger', 300);
			$table->string('vCurrencyDriver');
			$table->float('fRatioPassenger', 10, 0);
			$table->float('fRatioDriver', 10, 0);
			$table->enum('ePayment_request', array('Yes','No'))->default('No');
			$table->integer('iCancelReasonId')->default(0);
			$table->string('vCancelReason');
			$table->string('vCancelComment');
			$table->enum('eCancelled', array('Yes','No'))->default('No');
			$table->string('vCouponCode');
			$table->string('vDiscount', 20);
			$table->float('fDiscount', 10, 0)->default(0);
			$table->enum('eDriverPaymentStatus', array('Settelled','Unsettelled'))->default('Unsettelled');
			$table->enum('eHotelPaymentStatus', array('Settelled','Unsettelled'))->default('Unsettelled');
			$table->enum('ePaymentCollect', array('Yes','No'))->default('No');
			$table->enum('ePaymentCollect_Delivery', array('Yes','No'))->default('No');
			$table->enum('eType', array('Ride','Deliver','UberX','Multi-Delivery'))->default('Ride');
			$table->string('vImage', 500);
			$table->enum('eImgSkip', array('None','Yes','No'))->default('None');
			$table->integer('iPackageTypeId');
			$table->string('vReceiverName', 50);
			$table->string('vReceiverMobile', 50);
			$table->text('tPickUpIns', 65535);
			$table->text('tDeliveryIns', 65535);
			$table->text('tPackageDetails', 65535);
			$table->integer('iUserPetId')->default(0);
			$table->string('vDeliveryConfirmCode', 55);
			$table->float('fRatio_USD', 10, 4);
			$table->enum('eFareType', array('Regular','Fixed','Hourly'))->comment('to see the trip is of fixed price or regular');
			$table->float('fRatio_RWF', 10)->default(0.00);
			$table->float('fRatio_TZS', 10)->default(0.00);
			$table->float('fRatio_KES', 10)->default(0.00);
			$table->float('fRatio_UGX', 10)->default(0.00);
			$table->float('fMinFareDiff', 10, 0)->default(0);
			$table->float('fWalletDebit', 10, 0)->default(0)->comment('wallet amount debited for this trip');
			$table->float('fSurgePriceDiff', 10, 0)->default(0)->comment('applied surge price diff');
			$table->string('vBeforeImage');
			$table->string('vAfterImage');
			$table->float('fTripGenerateFare', 10, 0)->default(0);
			$table->text('fGDtime', 65535);
			$table->text('fGDdistance', 65535);
			$table->float('fTipPrice', 10, 0)->default(0);
			$table->integer('iQty')->default(1);
			$table->float('fVisitFee', 10, 0)->default(0);
			$table->float('fMaterialFee', 10, 0)->default(0);
			$table->float('fMiscFee', 10, 0)->default(0);
			$table->float('fDriverDiscount', 10, 0)->default(0);
			$table->float('fCancellationFare', 10, 0);
			$table->enum('eCancelChargeFailed', array('Yes','No'))->default('No');
			$table->enum('eCancelledBy', array('','Passenger','Driver'))->default('');
			$table->string('vCountryUnitRider', 100);
			$table->string('vCountryUnitDriver', 100);
			$table->float('fTollPrice', 10, 0)->default(0);
			$table->string('vTollPriceCurrencyCode', 300);
			$table->enum('eTollSkipped', array('Yes','No'))->default('No');
			$table->enum('eHailTrip', array('Yes','No'))->default('No');
			$table->dateTime('dPauseTime');
			$table->text('tTotalPauseTime', 65535);
			$table->string('vTimeZone');
			$table->integer('iUserAddressId')->default(0);
			$table->text('tUserComment', 65535);
			$table->enum('eBeforeUpload', array('Yes','No'))->default('No');
			$table->enum('eAfterUpload', array('Yes','No'))->default('No');
			$table->enum('ePaymentByReceiver', array('Yes','No'))->default('No')->comment('multi-delivery');
			$table->enum('eFareGenerated', array('Yes','No'))->default('No')->comment('multi-delivery');
			$table->integer('iRunningTripDeliveryNo')->default(0)->comment('multi-delivery');
			$table->enum('eSignVerification', array('Yes','No'))->default('No')->comment('multi-delivery');
			$table->string('vSignImage')->comment('multi-delivery');
			$table->integer('iCabBookingId')->default(0);
			$table->integer('iCabRequestId')->default(0);
			$table->float('fTax1', 10, 0)->default(0);
			$table->float('fTax2', 10, 0)->default(0);
			$table->float('fTax1Percentage', 10, 0)->default(0);
			$table->float('fTax2Percentage', 10, 0)->default(0);
			$table->enum('eFlatTrip', array('Yes','No'))->default('No');
			$table->float('fFlatTripPrice', 10, 0)->default(0);
			$table->float('fWaitingFees', 10, 0)->default(0);
			$table->integer('iAirportLocationId')->default(0);
			$table->enum('eAirportLocation', array('Yes','No'))->default('No');
			$table->float('fOutStandingAmount', 10, 0)->default(0);
			$table->integer('iWaitingFeeTimeLimit');
			$table->string('vVerificationMethod');
			$table->enum('eServiceEnd', array('Yes','No'))->default('No')->comment('This is related to UberX service.');
			$table->enum('eBookingFrom', array('Admin','Hotel','Kiosk','Company',''))->default('')->comment('For Hotel Panel Web');
			$table->float('fHotelCommision', 10, 0)->comment('For Hotel Panel Web');
			$table->integer('iHotelBookingId')->comment('For Hotel Panel Web');
			$table->float('fHotelBookingChargePercentage', 10, 0)->comment('link with Administrator tabel');
			$table->enum('eWalletDebitAllow', array('Yes','No'))->default('Yes');
			$table->enum('eSystem', array('General','DeliverAll'))->default('General');
			$table->enum('ePaymentBy', array('Passenger','Organization'))->default('Passenger');
			$table->string('vProfileEmail', 500);
			$table->enum('eOrganizationPaymentStatus', array('Settelled','Unsettelled'))->default('Unsettelled');
			$table->integer('iUserProfileId');
			$table->integer('iTripReasonId');
			$table->text('vReasonTitle', 65535);
			$table->enum('eTripReason', array('Yes','No'))->default('No');
			$table->enum('ePoolRide', array('Yes','No'))->default('No')->comment('Only for Pool Rides ');
			$table->integer('iPersonSize')->comment('Only for Pool Rides ');
			$table->integer('iPoolParentId')->default(0);
			$table->float('fExtraPersonCharge', 10)->default(0.00);
			$table->float('fPoolDuration', 10)->default(0.00);
			$table->float('fPoolDistance', 10)->default(0.00);
			$table->enum('eBookForSomeOneElse', array('Yes','No'))->default('No');
			$table->string('vBookSomeOneName');
			$table->string('vBookSomeOneNumber', 50);
			$table->float('fTripHoldPrice', 10)->default(0.00);
			$table->float('fAirportPickupSurge', 10, 0);
			$table->float('fAirportDropoffSurge', 10, 0);
			$table->float('fAirportPickupSurgeAmount', 10, 0);
			$table->float('fAirportDropoffSurgeAmount', 10, 0);
			$table->enum('ePayWallet', array('Yes','No'))->default('No');
			$table->enum('eServiceLocation', array('Passanger','Driver'))->default('Passanger');
			$table->text('tVehicleTypeData', 65535);
			$table->text('tVehicleTypeFareData');
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
		Schema::drop('trips');
	}

}
