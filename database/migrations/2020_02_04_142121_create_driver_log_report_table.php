<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverLogReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_log_report', function(Blueprint $table)
		{
			$table->integer('iDriverLogId', true);
			$table->integer('iDriverId');
			$table->timestamp('dLoginDateTime')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('dLogoutDateTime')->default('0000-00-00 00:00:00');
			$table->string('vIP');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_log_report');
	}

}
