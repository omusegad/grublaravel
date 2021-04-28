<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsUserDriverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ratings_user_driver', function(Blueprint $table)
		{
			$table->integer('iRatingId', true);
			$table->integer('iOrderId');
			$table->integer('iTripId');
			$table->string('vRating1', 100);
			$table->timestamp('tDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->enum('eUserType', array('Driver','Passenger'))->nullable()->default('Passenger');
			$table->string('vMessage', 2500);
			$table->enum('eFromUserType', array('Driver','Passenger','Company'))->default('Passenger');
			$table->enum('eToUserType', array('Driver','Passenger','Company'))->default('Company');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ratings_user_driver');
	}

}
