<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateWeeklyUserMealsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_weekly_user_meals', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('iUserId')->unsigned();
			$table->string('group_reference_code', 191);
			$table->string('corporate_subscriptions_meals_id', 191);
			$table->string('orderID', 191);
			$table->float('price');
			$table->string('quantity', 191);
			$table->float('deliveryFee');
			$table->date('deliveryDate');
			$table->float('totalPay');
			$table->enum('payTime', array('ON_ORDER','ON_DELIVERY'));
			$table->enum('ePaymentOption', array('CASH','MPESA'));
			$table->enum('paymentStatus', array('PAID','NOT_INITIATED'))->default('NOT_INITIATED');
			$table->enum('deliveryStatus', array('DELIVERED','PICKED_BY_DRIVER','BEING_PREPARED'))->default('BEING_PREPARED');
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
		Schema::drop('corporate_weekly_user_meals');
	}

}
