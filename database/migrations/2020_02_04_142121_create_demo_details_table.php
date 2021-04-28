<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDemoDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('demo_details', function(Blueprint $table)
		{
			$table->integer('iDemoDetailsId', true);
			$table->integer('iDriverId');
			$table->string('vRandomCode', 50);
			$table->string('vDriverName', 100);
			$table->string('vDriverEmail', 100);
			$table->string('vDriverPassword', 100);
			$table->integer('iRiderId');
			$table->string('vRiderName', 100);
			$table->string('vRiderEmail', 100);
			$table->string('vRiderPassword', 100);
			$table->integer('iHotelId');
			$table->string('vHotelName', 100);
			$table->string('vHotelEmail', 100);
			$table->string('vHotelPassword', 100);
			$table->string('vDiscount', 10);
			$table->date('dDate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('demo_details');
	}

}
