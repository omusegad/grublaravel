<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverDocTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_doc', function(Blueprint $table)
		{
			$table->integer('iDriverId');
			$table->string('vLicence', 500);
			$table->string('vNoc', 500);
			$table->string('vCerti', 500);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_doc');
	}

}
