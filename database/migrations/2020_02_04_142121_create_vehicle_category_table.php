<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle_category', function(Blueprint $table)
		{
			$table->integer('iVehicleCategoryId', true);
			$table->text('vCategory_EN', 65535);
			$table->string('vCategory_ES', 100);
			$table->string('vCategory_FN', 100);
			$table->string('vCategory_TH', 100);
			$table->string('vCategory_DN', 100);
			$table->string('vCategory_EE', 100);
			$table->string('vCategory_FI', 100);
			$table->string('vCategory_DE', 100);
			$table->string('vCategory_LV', 100);
			$table->string('vCategory_LT', 100);
			$table->string('vCategory_NO', 100);
			$table->string('vCategory_PO', 100);
			$table->string('vCategory_RS', 100);
			$table->string('vCategory_SW', 100);
			$table->string('vCategory_IT', 100);
			$table->string('vCategory_AR', 100);
			$table->string('vCategory_UR', 100);
			$table->string('vCategory_PS', 100);
			$table->string('vCategory_NL', 100);
			$table->string('vCategory_EL', 100);
			$table->string('vCategory_AZ', 100);
			$table->string('vCategory_BG', 100);
			$table->string('vCategory_ZH', 100);
			$table->string('vCategory_HR', 100);
			$table->string('vCategory_CS', 100);
			$table->string('vCategory_HU', 100);
			$table->string('vCategory_TS', 100);
			$table->string('vCategory_HW', 100);
			$table->string('vCategory_PT', 100);
			$table->string('vCategory_SV', 100);
			$table->string('vCategory_BS', 100);
			$table->string('vCategory_ZU', 100);
			$table->string('vCategory_RO', 100);
			$table->string('vCategory_KU', 100);
			$table->string('vCategory_LA', 100);
			$table->string('vCategory_ID', 100);
			$table->string('vCategory_MS', 100);
			$table->string('vCategory_JA', 100);
			$table->string('vCategory_KO', 100);
			$table->string('vCategory_MA', 100);
			$table->string('vCategory_CA', 100);
			$table->string('vCategoryTitle_EN', 100);
			$table->string('vCategoryTitle_ES', 100);
			$table->string('vCategoryTitle_FN', 100);
			$table->string('vCategoryTitle_TH', 100);
			$table->string('vCategoryTitle_DN', 100);
			$table->string('vCategoryTitle_EE', 100);
			$table->string('vCategoryTitle_FI', 100);
			$table->string('vCategoryTitle_DE', 100);
			$table->string('vCategoryTitle_LV', 100);
			$table->string('vCategoryTitle_LT', 100);
			$table->string('vCategoryTitle_NO', 100);
			$table->string('vCategoryTitle_PO', 100);
			$table->string('vCategoryTitle_RS', 100);
			$table->string('vCategoryTitle_SW', 100);
			$table->string('vCategoryTitle_IT', 100);
			$table->string('vCategoryTitle_AR', 100);
			$table->string('vCategoryTitle_UR', 100);
			$table->string('vCategoryTitle_PS', 100);
			$table->string('vCategoryTitle_NL', 100);
			$table->string('vCategoryTitle_EL', 100);
			$table->string('vCategoryTitle_AZ', 100);
			$table->string('vCategoryTitle_BG', 100);
			$table->string('vCategoryTitle_ZH', 100);
			$table->string('vCategoryTitle_HR', 100);
			$table->string('vCategoryTitle_CS', 100);
			$table->string('vCategoryTitle_HU', 100);
			$table->string('vCategoryTitle_TS', 100);
			$table->string('vCategoryTitle_HW', 100);
			$table->string('vCategoryTitle_PT');
			$table->string('vCategoryTitle_JA', 100);
			$table->string('vCategoryTitle_KO', 100);
			$table->string('vCategoryTitle_MA', 100);
			$table->string('vCategoryTitle_CA', 100);
			$table->text('tCategoryDesc_EN', 65535);
			$table->text('tCategoryDesc_ES', 65535);
			$table->text('tCategoryDesc_FN', 65535);
			$table->text('tCategoryDesc_TH', 65535);
			$table->text('tCategoryDesc_DN', 65535);
			$table->text('tCategoryDesc_EE', 65535);
			$table->text('tCategoryDesc_FI', 65535);
			$table->text('tCategoryDesc_DE', 65535);
			$table->text('tCategoryDesc_LV', 65535);
			$table->text('tCategoryDesc_LT', 65535);
			$table->text('tCategoryDesc_NO', 65535);
			$table->text('tCategoryDesc_PO', 65535);
			$table->text('tCategoryDesc_RS', 65535);
			$table->text('tCategoryDesc_SW', 65535);
			$table->text('tCategoryDesc_IT', 65535);
			$table->text('tCategoryDesc_AR', 65535);
			$table->text('tCategoryDesc_UR', 65535);
			$table->text('tCategoryDesc_PS', 65535);
			$table->text('tCategoryDesc_NL', 65535);
			$table->text('tCategoryDesc_EL', 65535);
			$table->text('tCategoryDesc_AZ', 65535);
			$table->text('tCategoryDesc_BG', 65535);
			$table->text('tCategoryDesc_ZH', 65535);
			$table->text('tCategoryDesc_HR', 65535);
			$table->text('tCategoryDesc_CS', 65535);
			$table->text('tCategoryDesc_HU', 65535);
			$table->text('tCategoryDesc_TS', 65535);
			$table->text('tCategoryDesc_HW', 65535);
			$table->text('tCategoryDesc_PT', 65535);
			$table->text('tCategoryDesc_SV', 65535);
			$table->text('tCategoryDesc_BS', 65535);
			$table->text('tCategoryDesc_ZU', 65535);
			$table->text('tCategoryDesc_RO', 65535);
			$table->text('tCategoryDesc_KU', 65535);
			$table->text('tCategoryDesc_LA', 65535);
			$table->text('tCategoryDesc_ID', 65535);
			$table->text('tCategoryDesc_MS', 65535);
			$table->string('vCategory_SI', 100);
			$table->string('vCategoryTitle_SI', 100);
			$table->text('tCategoryDesc_SI', 65535);
			$table->string('vCategory_TA', 100);
			$table->string('vCategoryTitle_TA', 100);
			$table->text('tCategoryDesc_TA', 65535);
			$table->string('vCategory_VI', 100);
			$table->string('vCategoryTitle_VI', 100);
			$table->text('tCategoryDesc_VI', 65535);
			$table->string('vCategory_TL', 100);
			$table->string('vCategoryTitle_TL', 100);
			$table->text('tCategoryDesc_TL', 65535);
			$table->string('vCategory_KM', 100);
			$table->string('vCategoryTitle_KM', 100);
			$table->text('tCategoryDesc_KM', 65535);
			$table->string('vCategory_BN', 100);
			$table->string('vCategoryTitle_BN', 100);
			$table->text('tCategoryDesc_BN', 65535);
			$table->integer('iParentId')->default(0);
			$table->string('vLogo', 500);
			$table->string('vLogo1', 500);
			$table->string('vHomepageLogo', 500);
			$table->enum('ePriceType', array('Service','Provider'))->default('Service');
			$table->enum('eBeforeUpload', array('Yes','No'))->default('No');
			$table->enum('eAfterUpload', array('Yes','No'))->default('No');
			$table->integer('iDisplayOrder')->default(1);
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
			$table->enum('eShowType', array('Icon','Banner','Icon-Banner'))->default('Icon');
			$table->enum('eMaterialCommision', array('Yes','No'))->default('No');
			$table->string('vBannerImage');
			$table->enum('eCatType', array('Ride','MotoRide','Delivery','MultipleDelivery','MotoDelivery','Rental','MotoRental','MoreDelivery','DeliverAll','ServiceProvider'))->default('ServiceProvider');
			$table->enum('eSubCatType', array('','Ambulance'))->default('');
			$table->enum('eFor', array('','RideCategory','DeliveryCategory','DeliverAllCategory'))->default('');
			$table->enum('eDeliveryType', array('','Single','Multi'))->comment('Applies only when eCatType set to delivery');
			$table->integer('iServiceId')->comment('Linked to service_categories. Only applies for Food/Grocery/DeliverAll');
			$table->text('tBannerButtonText', 65535);
			$table->enum('eDetailPageView', array('','Icon','Banner'));
			$table->float('fCommision', 10)->default(0.00)->comment('Associate with eMaterialCommision');
			$table->float('fWaitingFees', 10)->default(0.00);
			$table->integer('iWaitingFeeTimeLimit')->default(0);
			$table->float('fCancellationFare', 10)->comment('Used for Other services when Flow is provider based.');
			$table->integer('iCancellationTimeLimit')->comment('Used for Other services when Flow is provider based.');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle_category');
	}

}
