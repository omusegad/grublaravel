<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->integer('iPaymentId', true);
			$table->text('tPaymentUserID', 65535);
			$table->text('vPaymentUserStatus', 65535);
			$table->enum('ePaymentDriverStatus', array('Paid','UnPaid'))->default('UnPaid');
			$table->text('tPaymentDriverID', 65535);
			$table->integer('iTripId')->comment('link with trips');
			$table->integer('iOrderId');
			$table->float('fCommision', 10, 0)->default(0);
			$table->float('iAmountUser', 10, 0)->default(0);
			$table->float('iAmountDriver', 10, 0)->default(0);
			$table->text('tPaymentDetails', 65535);
			$table->string('vPaymentMode', 500);
			$table->integer('iUserWalletId');
			$table->integer('iTripOutstandId');
			$table->string('vPaymentMethod', 500);
			$table->enum('eEvent', array('','Wallet','Trip','TripTip','OutStanding','OrderPayment'));
			$table->integer('iUserId');
			$table->enum('eUserType', array('Passenger','Driver'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payments');
	}

}
