<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripOrderDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_order_details', function(Blueprint $table)
		{
			$table->integer('iOrderDetailId', true);
			$table->integer('iCabBookingId');
			$table->integer('iTripId');
			$table->integer('iMenuItemId');
			$table->integer('iQuantity');
			$table->float('fPrice', 10);
			$table->float('fTotalPrice', 10);
			$table->text('tMenuItemOptions', 65535);
			$table->text('tMenuItemAddOns', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_order_details');
	}

}
