<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company_request', function(Blueprint $table)
		{
			$table->integer('iCompanyRequestId', true);
			$table->integer('iRequestId');
			$table->integer('iCompanyId');
			$table->integer('iOrderId');
			$table->text('tMessage', 65535);
			$table->text('vMsgCode', 65535);
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
		Schema::drop('company_request');
	}

}
