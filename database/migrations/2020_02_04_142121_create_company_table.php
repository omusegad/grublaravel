<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company', function(Blueprint $table)
		{
			$table->integer('iCompanyId', true);
			$table->integer('iServiceId');
			$table->string('vContactName');
			$table->string('vName');
			$table->string('vLastName');
			$table->string('vLoginId');
			$table->string('vPassword');
			$table->string('vImage');
			$table->string('vCoverImage');
			$table->string('vCompany');
			$table->string('vCaddress');
			$table->string('vCadress2');
			$table->string('vCity');
			$table->string('vState');
			$table->string('vZip');
			$table->string('vInviteCode');
			$table->date('dBirthDate');
			$table->string('vFathersName');
			$table->string('vBackCheck');
			$table->string('vDriverImg')->nullable();
			$table->string('vEmail')->nullable();
			$table->string('vPhone')->nullable();
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active')->comment('Deleted will comes when admin want to delete company');
			$table->string('vLang');
			$table->string('vCurrencyCompany');
			$table->string('vVat');
			$table->string('vCountry');
			$table->string('vCode');
			$table->string('vRestuarantLocation');
			$table->string('vRestuarantLocationLat');
			$table->string('vRestuarantLocationLong');
			$table->enum('eAccess', array('Deaf','None'))->default('None');
			$table->string('vNoc');
			$table->string('vCerti');
			$table->timestamp('tRegistrationDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('vPasswordToken');
			$table->string('vPassword_token');
			$table->dateTime('tLastOnline')->default('0000-00-00 00:00:00');
			$table->enum('eEmailVerified', array('Yes','No'))->default('No');
			$table->enum('ePhoneVerified', array('Yes','No'))->default('No');
			$table->time('vFromMonFriTimeSlot1');
			$table->time('vToMonFriTimeSlot1');
			$table->time('vFromMonFriTimeSlot2');
			$table->time('vToMonFriTimeSlot2');
			$table->time('vFromSatSunTimeSlot1');
			$table->time('vToSatSunTimeSlot1');
			$table->time('vFromSatSunTimeSlot2');
			$table->time('vToSatSunTimeSlot2');
			$table->float('fMinOrderValue', 10, 0)->default(0);
			$table->float('fPackingCharge', 10, 0)->default(0);
			$table->integer('vRadius');
			$table->integer('fPrepareTime');
			$table->enum('fOfferAppyType', array('None','First','All'));
			$table->enum('fOfferType', array('','Flat','Percentage'));
			$table->float('fTargetAmt', 10, 0);
			$table->float('fOfferAmt', 10, 0);
			$table->float('fMaxOfferAmt', 10, 0);
			$table->float('fTax', 10, 0);
			$table->string('vPaymentEmail');
			$table->string('vAcctHolderName');
			$table->string('vAcctNo');
			$table->string('vBankName');
			$table->string('vBankLocation');
			$table->string('vSwiftCode');
			$table->float('fPricePerPerson', 10, 0);
			$table->string('vAvgRating');
			$table->text('iGcmRegId');
			$table->enum('eDeviceType', array('Android','Ios'))->default('Android');
			$table->enum('eAvailable', array('Yes','No'))->default('No');
			$table->integer('iMaxItemQty');
			$table->enum('eSignUpType', array('Normal','Facebook','Twitter','Google'))->default('Normal');
			$table->text('vFirebaseDeviceToken');
			$table->string('vTimeZone');
			$table->text('tSessionId');
			$table->text('tDeviceSessionId');
			$table->integer('iAppVersion');
			$table->enum('eLogout', array('Yes','No'))->default('Yes');
			$table->enum('eChangeLang', array('Yes','No'))->default('No');
			$table->enum('eDemoDisplay', array('Yes','No'))->default('No');
			$table->enum('eLock', array('Yes','No'))->default('No');
			$table->integer('vVerificationCount')->default(0);
			$table->dateTime('dSendverificationDate');
			$table->string('vEmailVarificationCode');
			$table->enum('eSystem', array('General','DeliverAll','Organization'))->default('General');
			$table->enum('eDebugMode', array('Yes','No'))->default('No');
			$table->integer('iAdvertBannerId')->default(0);
			$table->timestamp('tSeenAdvertiseTime')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('tApiFileName')->comment('Field is for name of api file');
			$table->text('tVersion')->comment('Field is for version name of application');
			$table->text('tDeviceData');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company');
	}

}
