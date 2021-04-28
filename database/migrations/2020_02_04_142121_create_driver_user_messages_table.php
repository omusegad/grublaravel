<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverUserMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_user_messages', function(Blueprint $table)
		{
			$table->integer('iMessageId', true);
			$table->text('tMessage', 65535);
			$table->text('tSendertype', 65535);
			$table->integer('iTripId')->comment('Link with trips');
			$table->timestamp('tDate')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_user_messages');
	}

}
