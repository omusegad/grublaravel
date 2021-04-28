<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('country', function(Blueprint $table)
		{
			$table->integer('iCountryId', true);
			$table->string('vCountry', 64)->default('')->index('IDX_COUNTRIES_NAME');
			$table->char('vCountryCode', 2)->default('')->index('vCountryCode');
			$table->char('vCountryCodeISO_3', 3)->default('');
			$table->string('vPhoneCode', 100);
			$table->string('vTimeZone');
			$table->string('vAlterTimeZone', 100);
			$table->string('vEmergencycode', 100);
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
			$table->enum('eUnit', array('KMs','Miles'))->default('KMs');
			$table->float('fTax1', 10, 0)->default(0);
			$table->float('fTax2', 10, 0)->default(0);
			$table->string('vCurrency', 50);
			$table->enum('eEnableToll', array('Yes','No'))->default('No');
			$table->enum('eZeroAllowed', array('Yes','No'))->default('No')->comment('This field only for prfix in mobile number in string.');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('country');
	}

}
