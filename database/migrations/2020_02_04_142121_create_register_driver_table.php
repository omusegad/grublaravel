<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegisterDriverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('register_driver', function(Blueprint $table)
		{
			$table->integer('iDriverId', true);
			$table->integer('iRefUserId');
			$table->enum('eRefType', array('Driver','Rider'));
			$table->string('vFbId', 500)->default('0');
			$table->integer('iCompanyId')->index('iCompanyId');
			$table->string('vName', 100);
			$table->string('vLastName');
			$table->string('vEmail', 100);
			$table->string('vLoginId', 100);
			$table->string('vPassword', 100);
			$table->enum('eGender', array('','Male','Female'));
			$table->string('vCode', 50);
			$table->string('vPhone', 50);
			$table->string('vLang', 50);
			$table->string('vLatitude', 50);
			$table->string('vLongitude', 50);
			$table->string('iDriverVehicleId', 50);
			$table->string('vCompany');
			$table->string('vCaddress');
			$table->string('vCadress2');
			$table->string('vCity', 10);
			$table->string('vState', 10);
			$table->string('vZip');
			$table->string('vInviteCode');
			$table->date('dBirthDate');
			$table->string('vFathersName');
			$table->string('vBackCheck');
			$table->string('vServiceLoc', 100);
			$table->string('vAvailability', 100);
			$table->string('vCarType', 100);
			$table->string('vAvgRating')->default('0.0');
			$table->text('iGcmRegId', 65535);
			$table->string('vImage');
			$table->string('vCreditCard');
			$table->string('vExpMonth');
			$table->string('vExpYear');
			$table->string('vCvv');
			$table->integer('iTripId');
			$table->string('vTripStatus', 50)->default('NONE');
			$table->enum('eStatus', array('active','inactive','Deleted','Suspend'))->default('inactive');
			$table->string('vVat', 10);
			$table->enum('eAccess', array('Deaf','None'))->default('None');
			$table->string('vCountry', 10);
			$table->dateTime('tLastOnline')->default('0000-00-00 00:00:00');
			$table->dateTime('tOnline')->default('0000-00-00 00:00:00');
			$table->dateTime('tSwitchOnline')->comment('Time when driver press online switch and becomes online');
			$table->string('vLicence');
			$table->string('vNoc');
			$table->string('vCerti');
			$table->date('dLicenceExp');
			$table->enum('eDeviceType', array('Android','Ios'))->default('Android');
			$table->enum('eDebugMode', array('Yes','No'))->default('No')->comment('This applies to IOS devices only');
			$table->string('vCurrencyDriver');
			$table->timestamp('tRegistrationDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->enum('eSentNotification', array('Yes','No'))->default('No');
			$table->date('dSentNotification');
			$table->enum('eDeliverModule', array('Yes','No'))->default('No');
			$table->integer('iAppVersion')->default(1);
			$table->string('vRefCode', 50);
			$table->dateTime('dRefDate');
			$table->string('vPaymentEmail', 500);
			$table->string('vBankAccountHolderName', 500);
			$table->string('vAccountNumber', 500);
			$table->string('vBankLocation', 500);
			$table->string('vBankName', 500);
			$table->string('vBIC_SWIFT_Code', 500);
			$table->enum('eEmailVerified', array('Yes','No'))->default('No');
			$table->enum('ePhoneVerified', array('Yes','No'))->default('No');
			$table->text('tProfileDescription', 65535);
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
			$table->string('vPasswordToken');
			$table->enum('eSignUpType', array('Normal','Facebook','Twitter','Google','LinkedIn'))->default('Normal');
			$table->text('tSessionId', 65535);
			$table->string('vPassword_token');
			$table->string('vRideCountry', 10);
			$table->text('tDeviceSessionId', 65535);
			$table->enum('eFemaleOnlyReqAccept', array('Yes','No'))->default('No');
			$table->text('vFirebaseDeviceToken', 65535);
			$table->enum('eLogout', array('Yes','No'))->default('Yes');
			$table->string('vTimeZone');
			$table->dateTime('tLocationUpdateDate');
			$table->text('vWorkLocation', 65535);
			$table->text('vWorkLocationLatitude', 65535);
			$table->text('vWorkLocationLongitude', 65535);
			$table->string('vWorkLocationRadius', 200);
			$table->enum('eChangeLang', array('Yes','No'))->default('No');
			$table->integer('vVerificationCount')->default(0);
			$table->dateTime('dSendverificationDate');
			$table->enum('eSelectWorkLocation', array('Dynamic','Fixed'))->default('Dynamic');
			$table->integer('vVerificationCountEmergency')->default(0);
			$table->dateTime('dSendverificationDateEmergency');
			$table->enum('eIsFeatured', array('Yes','No'))->default('No');
			$table->enum('eIsBlocked', array('Yes','No'))->default('No');
			$table->dateTime('tBlockeddate')->default('0000-00-00 00:00:00');
			$table->enum('eTestUser', array('Yes','No'))->default('No')->comment('This is not used');
			$table->string('vEmailVarificationCode', 500);
			$table->enum('eEnableDemoLocDispatch', array('Yes','No'))->default('No');
			$table->integer('iAdvertBannerId')->default(0);
			$table->timestamp('tSeenAdvertiseTime')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('vPoolDestLat');
			$table->string('vPoolDestLang');
			$table->enum('eEnableServiceAtLocation', array('Yes','No'))->default('No');
			$table->text('tApiFileName', 65535)->comment('Field is for name of api file');
			$table->text('tVersion', 65535)->comment('Field is for version name of application');
			$table->text('tDeviceData', 65535);
			$table->enum('eDestinationMode', array('Yes','No'))->default('No');
			$table->integer('iDestinationCount');
			$table->timestamp('tDestinationModifiedDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('vFlutterWaveToken', 500);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('register_driver');
	}

}
