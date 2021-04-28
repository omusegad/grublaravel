<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMakeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('make', function(Blueprint $table)
		{
			$table->integer('iMakeId', true);
			$table->string('vMake');
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('make');
	}

}
