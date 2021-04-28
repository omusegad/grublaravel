<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripStatusMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_status_messages', function(Blueprint $table)
		{
			$table->integer('iStatusId', true);
			$table->integer('iTripId');
			$table->integer('iOrderId');
			$table->integer('iDriverId');
			$table->integer('iUserId');
			$table->text('tMessage', 65535);
			$table->enum('eFromUserType', array('Driver','Passenger',''))->default('');
			$table->enum('eToUserType', array('Driver','Passenger',''))->default('');
			$table->enum('eReceived', array('Yes','No'))->default('No');
			$table->timestamp('dAddedDate')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_status_messages');
	}

}
