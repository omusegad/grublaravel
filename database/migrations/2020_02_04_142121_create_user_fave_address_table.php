<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserFaveAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_fave_address', function(Blueprint $table)
		{
			$table->integer('iUserFavAddressId', true);
			$table->integer('iUserId')->comment('Linked with register_user- iUserId OR register_driver - iDriverId');
			$table->enum('eUserType', array('Driver','Passenger'));
			$table->text('vAddress', 65535);
			$table->text('vLatitude', 65535);
			$table->text('vLongitude', 65535);
			$table->dateTime('dAddedDate');
			$table->string('vTimeZone');
			$table->enum('eType', array('Home','Work'))->default('Home');
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
		Schema::drop('user_fave_address');
	}

}
