<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderStatusLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_status_logs', function(Blueprint $table)
		{
			$table->integer('iOrderLogId', true);
			$table->integer('iOrderId');
			$table->integer('iStatusCode')->comment('Relation with order status');
			$table->dateTime('dDate');
			$table->string('vIp');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_status_logs');
	}

}
