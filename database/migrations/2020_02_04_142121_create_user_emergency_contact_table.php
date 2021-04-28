<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserEmergencyContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_emergency_contact', function(Blueprint $table)
		{
			$table->integer('iEmergencyId', true);
			$table->integer('iUserId')->comment('Linked with register_user- iUserId OR register_driver - iDriverId');
			$table->string('vName', 100);
			$table->string('vPhone', 100);
			$table->enum('eUserType', array('Passenger','Driver'))->default('Passenger');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_emergency_contact');
	}

}
