<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_address', function(Blueprint $table)
		{
			$table->integer('iUserAddressId', true);
			$table->integer('iUserId')->comment('Linked with register_user- iUserId OR register_driver - iDriverId');
			$table->enum('eUserType', array('Driver','Rider'));
			$table->text('vServiceAddress', 65535);
			$table->string('vBuildingNo', 100);
			$table->text('vLandmark', 65535);
			$table->text('vAddressType', 65535);
			$table->text('vLatitude', 65535);
			$table->text('vLongitude', 65535);
			$table->dateTime('dAddedDate');
			$table->string('vTimeZone');
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
		Schema::drop('user_address');
	}

}
