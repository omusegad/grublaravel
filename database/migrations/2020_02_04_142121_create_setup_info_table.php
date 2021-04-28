<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSetupInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('setup_info', function(Blueprint $table)
		{
			$table->integer('iSetupId', true);
			$table->string('vName');
			$table->string('vProjectName');
			$table->enum('eProductType', array('Ride','Delivery','Ride-Delivery','UberX','Ride-Delivery-UberX','Ride-Delivery-UberX-Shark','Foodonly','Deliverall'))->default('Ride');
			$table->enum('eDeliveryType', array('Single','Multi','NONE'))->default('NONE');
			$table->string('vUFX_Driver');
			$table->string('vUFX_Rider');
			$table->timestamp('dSetupDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->enum('eSetupInfo', array('Yes','No'))->default('No');
			$table->enum('eLang', array('Yes','No'))->default('No');
			$table->enum('eLablesConverted', array('Yes','No'))->default('No')->comment('if labels are converted or not');
			$table->enum('eAppTypeLabelChanged', array('Yes','No'))->default('No')->comment('like if delivery then replace rider to sender');
			$table->enum('eCurrency', array('Yes','No'))->default('No');
			$table->enum('eConfiguration', array('Yes','No'))->default('No');
			$table->enum('eTableTruncate', array('Yes','No'))->default('No');
			$table->enum('eExtraImagesRemoved', array('Yes','No'))->default('No');
			$table->enum('eLablesAdded', array('Yes','No'))->default('No');
			$table->enum('ePackageType', array('standard','enterprise','shark'))->default('standard');
			$table->enum('eEnableKiosk', array('Yes','No'))->default('No');
			$table->enum('eEnableHotel', array('Yes','No'))->default('No');
			$table->enum('eConfigurationApplied', array('Yes','No'))->default('No')->comment('Yes,No');
			$table->enum('eLanguageFieldsSetup', array('Yes','No'))->default('No');
			$table->enum('eCurrencyFieldsSetup', array('Yes','No'))->default('No');
			$table->enum('eLanguageLabelConversion', array('Yes','No'))->default('No');
			$table->enum('eOtherTableValueConversion', array('Yes','No'))->default('No');
			$table->text('lAddOnConfiguration');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('setup_info');
	}

}
