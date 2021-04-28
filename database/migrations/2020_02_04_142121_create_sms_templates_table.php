<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSmsTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sms_templates', function(Blueprint $table)
		{
			$table->integer('iSMSId', true);
			$table->string('vSMS_Code', 500)->nullable();
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
			$table->text('vBody_DN', 65535)->nullable();
			$table->text('vBody_EN', 65535)->nullable();
			$table->text('vBody_EE', 65535)->nullable();
			$table->text('vBody_FI', 65535)->nullable();
			$table->text('vBody_FN', 65535)->nullable();
			$table->text('vBody_DE', 65535)->nullable();
			$table->text('vBody_LV', 65535)->nullable();
			$table->text('vBody_LT', 65535)->nullable();
			$table->text('vBody_NO', 65535)->nullable();
			$table->text('vBody_PO', 65535)->nullable();
			$table->text('vBody_RS', 65535)->nullable();
			$table->text('vBody_ES', 65535)->nullable();
			$table->text('vBody_SW', 65535)->nullable();
			$table->text('vBody_IT', 65535);
			$table->text('vBody_AR', 65535);
			$table->text('vBody_PS', 65535);
			$table->text('vBody_NL', 65535);
			$table->text('vBody_AZ', 65535);
			$table->text('vBody_BG', 65535);
			$table->text('vBody_ZH', 65535);
			$table->text('vBody_HR', 65535);
			$table->text('vBody_CS', 65535);
			$table->text('vBody_HU', 65535);
			$table->text('vBody_TS', 65535);
			$table->text('vBody_HW', 65535);
			$table->text('vBody_EL', 65535);
			$table->text('vBody_TH', 65535);
			$table->text('vBody_UR', 65535);
			$table->string('vBody_PT');
			$table->text('vBody_SI', 65535);
			$table->text('vBody_TA', 65535);
			$table->text('vBody_VI', 65535);
			$table->text('vBody_TL', 65535);
			$table->text('vBody_KM', 65535);
			$table->text('vBody_BN', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sms_templates');
	}

}
