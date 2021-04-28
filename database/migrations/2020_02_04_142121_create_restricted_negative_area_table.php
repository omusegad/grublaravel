<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestrictedNegativeAreaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('restricted_negative_area', function(Blueprint $table)
		{
			$table->integer('iRestrictedNegativeId', true);
			$table->integer('iLocationId');
			$table->integer('iCountryId');
			$table->integer('iStateId');
			$table->integer('iCityId');
			$table->text('vAddress', 65535);
			$table->enum('eRestrictType', array('All','Pick Up','Drop Off'))->default('All');
			$table->enum('eType', array('Allowed','Disallowed'));
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('restricted_negative_area');
	}

}
