<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripOutstandingAmountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_outstanding_amount', function(Blueprint $table)
		{
			$table->integer('iTripOutstandId', true);
			$table->enum('ePaidByWallet', array('Yes','No'))->default('No');
			$table->integer('iOrderId');
			$table->integer('iTripId');
			$table->integer('iUserId');
			$table->integer('iDriverId');
			$table->integer('iCompanyId');
			$table->integer('iOrganizationId');
			$table->float('fWalletDebit', 10, 0)->default(0);
			$table->float('fCancellationFare', 10, 0);
			$table->float('fPendingAmount', 10, 0)->default(0);
			$table->float('fCommision', 10, 0)->default(0);
			$table->float('fDriverPendingAmount', 10, 0)->default(0);
			$table->float('fRatio_USD', 10, 4);
			$table->float('fRatio_RWF', 10)->default(0.00);
			$table->float('fRatio_TZS', 10)->default(0.00);
			$table->float('fRatio_KES', 10)->default(0.00);
			$table->float('fRatio_UGX', 10)->default(0.00);
			$table->enum('ePaidByPassenger', array('Yes','No'))->default('No');
			$table->enum('ePaidByOrganization', array('Yes','No'))->default('No');
			$table->enum('ePaidToDriver', array('Yes','No'))->default('No');
			$table->enum('vTripPaymentMode', array('Cash','Paypal','Card','Organization'));
			$table->string('vTripAdjusmentId', 100);
			$table->string('vOrderAdjusmentId', 200);
			$table->enum('ePaymentBy', array('Passenger','Organization'))->default('Passenger');
			$table->enum('eBillGenerated', array('Yes','No'))->default('No');
			$table->enum('eAuthoriseIdName', array('iCabBookingId','iCabRequestId','iTripId','No'))->default('No');
			$table->integer('iAuthoriseId')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_outstanding_amount');
	}

}
