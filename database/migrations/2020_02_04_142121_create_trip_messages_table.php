<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_messages', function(Blueprint $table)
		{
			$table->integer('iMessageId', true);
			$table->integer('iTripId');
			$table->integer('iThreadId');
			$table->integer('iFromMemberId');
			$table->integer('iToMemberId');
			$table->string('vSubject', 500);
			$table->text('tMessage', 65535);
			$table->dateTime('dAddedDate');
			$table->enum('eStatus', array('Read','Unread'));
			$table->enum('eUserType', array('Passenger','Driver'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_messages');
	}

}
