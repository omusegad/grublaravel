<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomeDriverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('home_driver', function(Blueprint $table)
		{
			$table->integer('iDriverId', true);
			$table->string('vImage', 200);
			$table->string('vName_EN', 200);
			$table->string('vName_FR', 200);
			$table->string('vName_SW', 200);
			$table->string('vName_ES', 200);
			$table->string('vName_DE', 200);
			$table->string('vDesignation_EN', 200);
			$table->string('vDesignation_FR', 200);
			$table->string('vDesignation_SW', 200);
			$table->string('vDesignation_ES', 200);
			$table->string('vDesignation_DE', 200);
			$table->text('tText_EN', 65535);
			$table->text('tText_FR', 65535);
			$table->text('tText_SW', 65535);
			$table->text('tText_ES', 65535);
			$table->text('tText_DE', 65535);
			$table->integer('iDisplayOrder');
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
			$table->integer('iCompanyId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('home_driver');
	}

}
