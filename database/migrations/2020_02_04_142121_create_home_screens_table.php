<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomeScreensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('home_screens', function(Blueprint $table)
		{
			$table->integer('iId', true);
			$table->string('vImageTitle');
			$table->string('vImageName');
			$table->string('iDescOrd');
			$table->enum('eStatus', array('Active','Inactive'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('home_screens');
	}

}
