<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_orders', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('orderID', 191);
			$table->enum('ePaymentOption', array('CASH','MPESA'));
			$table->enum('pSatus', array('PAID','NOT_PAID'));
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
		Schema::drop('corporate_orders');
	}

}
