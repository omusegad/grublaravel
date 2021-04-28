<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminAlertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_alerts', function(Blueprint $table)
		{
			$table->integer('iAlertId', true);
			$table->text('tAlertText', 65535);
			$table->integer('iCompanyId');
			$table->integer('iDriverId');
			$table->dateTime('dDate');
			$table->enum('eStatus', array('Read','Unread'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin_alerts');
	}

}
