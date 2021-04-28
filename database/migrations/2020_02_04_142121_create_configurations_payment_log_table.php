<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigurationsPaymentLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configurations_payment_log', function(Blueprint $table)
		{
			$table->integer('iLogId', true);
			$table->integer('iUserId');
			$table->timestamp('tChangedDateTime')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('vIP', 50);
			$table->text('lPayConfigData');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configurations_payment_log');
	}

}
