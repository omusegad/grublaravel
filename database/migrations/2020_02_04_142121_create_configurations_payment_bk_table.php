<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigurationsPaymentBkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configurations_payment_bk', function(Blueprint $table)
		{
			$table->integer('iSettingId', true);
			$table->text('tDescription', 65535);
			$table->string('vName');
			$table->text('vValue', 65535);
			$table->integer('vOrder');
			$table->enum('eType', array('General','Email','Apperance','Prices','Paypal','Meta','SMS','Payment','Social Media','App Settings','Installation Settings','Store Settings'))->default('General');
			$table->enum('eStatus', array('Active','Inactive'))->nullable();
			$table->text('tHelp', 65535);
			$table->enum('eInputType', array('Text','Textarea','Select','Number','NumericRange'))->default('Text');
			$table->enum('eZeroAllowed', array('Yes','No'))->default('No')->comment('This will take effect when eInputType is \'Number\'');
			$table->enum('eSpaceAllowed', array('Yes','No'))->default('Yes');
			$table->enum('eDoubleValueAllowed', array('Yes','No'))->default('No');
			$table->text('tSelectVal', 65535);
			$table->enum('eAdminDisplay', array('Yes','No'))->default('Yes');
			$table->enum('eRequireField', array('Yes','No'))->default('No')->comment('Use For Setup Interface Only');
			$table->enum('eConfigRequired', array('Yes','No'))->default('No');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configurations_payment_bk');
	}

}
