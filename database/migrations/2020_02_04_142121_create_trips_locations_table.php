<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripsLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trips_locations', function(Blueprint $table)
		{
			$table->integer('iTripLocationId', true);
			$table->integer('iTripId')->comment('Link with Trips');
			$table->timestamp('tDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('tPlatitudes');
			$table->text('tPlongitudes');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trips_locations');
	}

}
