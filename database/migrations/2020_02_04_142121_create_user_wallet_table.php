<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserWalletTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_wallet', function(Blueprint $table)
		{
			$table->integer('iUserWalletId', true);
			$table->integer('iUserId');
			$table->enum('eUserType', array('Driver','Rider'));
			$table->float('iBalance', 10);
			$table->enum('eType', array('Credit','Debit'))->default('Credit');
			$table->string('iTripId', 100);
			$table->enum('eFor', array('Deposit','Booking','Refund','Withdrawl','Charges','Referrer','Subscription','Transfer'))->default('Deposit');
			$table->text('tDescription', 65535);
			$table->enum('ePaymentStatus', array('Settelled','Unsettelled'))->default('Unsettelled');
			$table->dateTime('dDate');
			$table->float('fRatio_USD', 10, 4)->default(1.0000);
			$table->float('fRatio_RWF', 10)->default(0.00);
			$table->float('fRatio_TZS', 10)->default(0.00);
			$table->float('fRatio_KES', 10)->default(0.00);
			$table->float('fRatio_UGX', 10)->default(0.00);
			$table->integer('iOrderId');
			$table->text('iTransactionId', 65535);
			$table->integer('fromUserId');
			$table->enum('fromUserType', array('Driver','Rider'));
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
		Schema::drop('user_wallet');
	}

}
