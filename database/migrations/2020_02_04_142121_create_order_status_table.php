<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_status', function(Blueprint $table)
		{
			$table->integer('iOrderStatusId', true);
			$table->string('vStatus_Track')->default('')->unique('vStatus');
			$table->string('vStatus', 100);
			$table->integer('iStatusCode');
			$table->integer('iDisplayOrder');
			$table->string('vStatus_EN', 100);
			$table->string('vStatus_FR', 100);
			$table->string('vStatus_SW', 100);
			$table->string('vStatus_ES', 100);
			$table->string('vStatus_DE', 100);
			$table->text('vStatus_Track_EN', 65535);
			$table->text('vStatus_Track_FR', 65535);
			$table->text('vStatus_Track_SW', 65535);
			$table->text('vStatus_Track_ES', 65535);
			$table->text('vStatus_Track_DE', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_status');
	}

}
