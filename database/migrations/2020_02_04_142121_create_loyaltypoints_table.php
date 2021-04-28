<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoyaltypointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loyaltypoints', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('iUserId')->unsigned();
			$table->float('pointsAmount');
			$table->enum('redeemStatus', array('CREDIT','DEBIT'));
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('loyaltypoints');
	}

}
