<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coupon', function(Blueprint $table)
		{
			$table->integer('iCouponId', true);
			$table->string('vCouponCode', 50)->default('')->index('vCouponCode');
			$table->text('tDescription');
			$table->float('fDiscount', 10)->default(0.00);
			$table->enum('eType', array('percentage','cash'))->default('percentage');
			$table->enum('eValidityType', array('Permanent','Defined'))->default('Permanent');
			$table->date('dActiveDate')->default('0000-00-00');
			$table->date('dExpiryDate')->default('0000-00-00');
			$table->integer('iUsageLimit')->default(0);
			$table->integer('iUsed')->default(0);
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
			$table->enum('eSystemType', array('Ride','Delivery','UberX','DeliverAll','General'))->default('General');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coupon');
	}

}
