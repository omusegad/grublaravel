<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMpesatrasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mpesatras', function(Blueprint $table)
		{
			$table->integer('transId', true);
			$table->integer('iUserId');
			$table->integer('iCompanyId');
			$table->string('iOrderId');
			$table->string('GeneralUserType', 150);
			$table->string('GeneralDeviceType', 150);
			$table->string('MerchantRequestID');
			$table->string('phoneNumber', 40);
			$table->string('CheckoutRequestID');
			$table->string('ResultCode')->nullable();
			$table->string('ResponseDescription');
			$table->string('ResultDesc')->nullable();
			$table->string('Amount')->nullable();
			$table->enum('paymentStatus', array('FAILED','PAID'))->nullable()->default('FAILED');
			$table->string('vPaymentMethod');
			$table->enum('payType', array('ORDER','WALLET'));
			$table->string('MpesaReceiptNumber')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mpesatras');
	}

}
