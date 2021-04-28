<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverPreferencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_preferences', function(Blueprint $table)
		{
			$table->integer('iDriverPreferenceId', true);
			$table->integer('iPreferenceId');
			$table->integer('iDriverId');
			$table->enum('eType', array('Yes','No'))->default('No');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_preferences');
	}

}
