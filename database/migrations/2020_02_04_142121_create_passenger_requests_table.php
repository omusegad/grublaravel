<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePassengerRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passenger_requests', function(Blueprint $table)
		{
			$table->integer('iRequestId', true);
			$table->text('tMessage', 65535);
			$table->integer('iUserId');
			$table->integer('iDriverId');
			$table->text('iMsgCode', 65535);
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
		Schema::drop('passenger_requests');
	}

}
