<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePushnotificationLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pushnotification_log', function(Blueprint $table)
		{
			$table->integer('iPushnotificationId', true);
			$table->enum('eUserType', array('driver','rider','company'));
			$table->integer('iUserId');
			$table->text('tMessage', 65535);
			$table->dateTime('dDateTime');
			$table->string('IP_ADDRESS', 225);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pushnotification_log');
	}

}
