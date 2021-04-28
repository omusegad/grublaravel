<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('state', function(Blueprint $table)
		{
			$table->integer('iStateId', true);
			$table->integer('iCountryId')->default(0);
			$table->string('vStateCode', 32)->default('');
			$table->string('vState', 100);
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
		Schema::drop('state');
	}

}
