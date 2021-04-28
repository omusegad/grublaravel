<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCancelReasonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cancel_reason', function(Blueprint $table)
		{
			$table->integer('iCancelReasonId', true);
			$table->integer('iDisplayOrder');
			$table->integer('iSortId');
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
			$table->enum('eAllowedCharge', array('Yes','No'))->default('No')->comment('allow passenger to charge extra money as per vehicle_type');
			$table->text('vTitle_EN', 65535);
			$table->text('vTitle_FR', 65535);
			$table->text('vTitle_SW', 65535);
			$table->text('vTitle_ES', 65535);
			$table->text('vTitle_DE', 65535);
			$table->enum('eType', array('Ride','Deliver','UberX','DeliverAll'))->default('DeliverAll');
			$table->enum('eFor', array('General','Passenger','Driver','Company'))->default('General');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cancel_reason');
	}

}
