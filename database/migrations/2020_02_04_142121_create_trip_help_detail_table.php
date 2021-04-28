<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripHelpDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_help_detail', function(Blueprint $table)
		{
			$table->integer('iTripHelpDetailId', true);
			$table->integer('iTripId');
			$table->integer('iOrderId');
			$table->integer('iUserId');
			$table->integer('iHelpDetailId');
			$table->string('vComment');
			$table->dateTime('tDate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_help_detail');
	}

}
