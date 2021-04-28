<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryChargesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delivery_charges', function(Blueprint $table)
		{
			$table->integer('iDeliveyChargeId', true);
			$table->integer('iLocationId')->default(0)->index('iOrderId');
			$table->float('fOrderPriceValue', 10, 0);
			$table->float('fDeliveryChargeAbove', 10, 0);
			$table->float('fDeliveryChargeBelow', 10, 0);
			$table->float('fFreeOrderPriceSubtotal', 10, 0);
			$table->integer('iFreeDeliveryRadius')->default(0);
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('delivery_charges');
	}

}
