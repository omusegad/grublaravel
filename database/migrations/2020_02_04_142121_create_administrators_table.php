<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministratorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administrators', function(Blueprint $table)
		{
			$table->integer('iAdminId', true);
			$table->integer('iGroupId')->default(1);
			$table->string('vFirstName');
			$table->string('vLastName');
			$table->string('vEmail');
			$table->string('vContactNo', 100);
			$table->string('vCode', 50);
			$table->string('vPassword');
			$table->string('vCountry', 200);
			$table->string('vState');
			$table->string('vCity');
			$table->string('vAddress');
			$table->string('vAddressLat');
			$table->string('vAddressLong');
			$table->float('fHotelServiceCharge', 10, 0);
			$table->string('vPaymentEmail');
			$table->string('vBankAccountHolderName');
			$table->string('vAccountNumber');
			$table->string('vBankName');
			$table->string('vBankLocation');
			$table->string('vBIC_SWIFT_Code');
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
			$table->enum('eDefault', array('Yes','No'))->default('No');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('administrators');
	}

}
