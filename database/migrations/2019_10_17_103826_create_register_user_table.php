<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegisterUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('register_user', function(Blueprint $table)
		{
			$table->id('iUserId');
			$table->integer('iCompanyId')->index;
			$table->integer('iRefUserId')->index;
			$table->enum('eRefType', array('Driver','Rider'));
			$table->string('vFbId', 100)->default('0');
			$table->integer('iHotelId');
			$table->string('vName', 100);
			$table->string('vLastName');
			$table->string('vEmail', 100);
			$table->string('vPassword');
			$table->string('vCountry', 10);
			$table->string('vState');
			$table->string('vPhone', 50);
			$table->enum('eGender', array('','Male','Female'));
			$table->string('vCreditCard');
			$table->date('dBirthDate');
			$table->string('vExpMonth');
			$table->string('vExpYear');
			$table->string('vCvv');
			$table->string('vImgName');
			$table->string('vAvgRating', 100)->default('0.0');
			$table->enum('vLogoutDev', array('true','false'))->default('false');
			$table->text('iGcmRegId', 65535);
			$table->string('vCallFromDriver', 100);
			$table->integer('iTripId')->default(0)->comment('Link with trips');
			$table->string('vTripStatus', 25)->default('NONE')->comment('Link with trips \'iActive\'');
			$table->enum('vTripPaymentMode', array('Cash','Paypal','NONE','Card'))->default('NONE');
			$table->integer('iSelectedCarType');
			$table->float('fPickUpPrice', 10, 0)->default(1);
			$table->float('fNightPrice', 10, 0)->default(1);
			$table->text('tDestinationLatitude', 65535);
			$table->text('tDestinationLongitude', 65535);
			$table->text('tDestinationAddress', 65535);
			$table->string('vInviteCode', 100);
			$table->string('vCouponCode');
			$table->string('vLang', 10);
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
			$table->string('vPhoneCode', 10);
			$table->string('vZip');
			$table->string('vPassToken');
			$table->enum('eDeviceType', array('Android','Ios'))->default('Android');
			$table->enum('eDebugMode', array('Yes','No'))->default('No')->comment('This applies to IOS devices only');
			$table->string('vCurrencyPassenger', 300);
			$table->timestamp('tRegistrationDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('iCabBookingId')->comment('related to cab_booking ');
			$table->string('vStripeToken');
			$table->string('vStripeCusId')->comment('Working as cardUserKey for iyzipay payment gateway');
			$table->text('vBrainTreeToken', 65535);
			$table->text('vBrainTreeCustId', 65535);
			$table->string('vBrainTreeCustEmail');
			$table->string('vPaymayaCustId');
			$table->string('vPaymayaToken');
			$table->string('vOmiseCustId');
			$table->string('vOmiseToken');
			$table->text('vAdyenToken', 65535);
			$table->string('vXenditAuthId', 500);
			$table->string('vXenditToken', 500);
			$table->enum('eType', array('Ride','Deliver','UberX'))->default('Ride');
			$table->integer('iPackageTypeId');
			$table->string('vReceiverName', 50);
			$table->string('vReceiverMobile', 50);
			$table->text('tPickUpIns', 65535);
			$table->text('tDeliveryIns', 65535);
			$table->text('tPackageDetails', 65535);
			$table->enum('eDeliverModule', array('Yes','No'))->default('No');
			$table->integer('iUserPetId')->default(0);
			$table->integer('iAppVersion')->default(1);
			$table->string('vRefCode', 50);
			$table->dateTime('dRefDate');
			$table->string('vLatitude', 100);
			$table->string('vLongitude', 100);
			$table->dateTime('tLastOnline');
			$table->enum('eEmailVerified', array('Yes','No'))->default('No');
			$table->enum('ePhoneVerified', array('Yes','No'))->default('No');
			$table->integer('iQty')->default(1);
			$table->integer('iUserVehicleId');
			$table->string('vPasswordToken');
			$table->enum('eSignUpType', array('Normal','Facebook','Twitter','Google'))->default('Normal');
			$table->text('tSessionId', 65535);
			$table->string('vPassword_token');
			$table->string('vRideCountry', 10);
			$table->text('tDeviceSessionId', 65535);
			$table->enum('eHail', array('Yes','No'))->default('No');
			$table->text('vFirebaseDeviceToken', 65535);
			$table->float('fTollPrice', 10, 0)->default(0);
			$table->string('vTollPriceCurrencyCode', 300);
			$table->enum('eTollSkipped', array('Yes','No'))->default('No');
			$table->string('vTimeZone');
			$table->enum('eLogout', array('Yes','No'))->default('Yes');
			$table->enum('eIsBlocked', array('Yes','No'))->default('No');
			$table->dateTime('tBlockeddate');
			$table->dateTime('tLocationUpdateDate');
			$table->enum('eIs_Kiosk', array('Yes','No'))->default('No');
			$table->enum('eChangeLang', array('Yes','No'))->default('No');
			$table->integer('vVerificationCount')->default(0);
			$table->dateTime('dSendverificationDate');
			$table->float('fTripsOutStandingAmount', 10, 0)->default(0);
			$table->integer('vVerificationCountEmergency')->default(0);
			$table->dateTime('dSendverificationDateEmergency');
			$table->enum('eOutstandingAdjustment', array('Yes','No'))->default('No');
			$table->enum('eTestUser', array('Yes','No'))->default('No')->comment('This is not used');
			$table->string('vEmailVarificationCode', 500);
			$table->enum('eReviewModeLogin', array('Yes','No'))->default('No')->comment('This apply to IOS app only');
			$table->integer('iAdvertBannerId')->default(0);
			$table->timestamp('tSeenAdvertiseTime')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('tApiFileName', 65535)->comment('Field is for name of api file');
			$table->text('tVersion', 65535)->comment('Field is for version name of application');
			$table->text('tDeviceData', 65535);
            $table->string('vFlutterWaveToken', 500);
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('register_user');
	}

}
