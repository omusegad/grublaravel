<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoodMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food_menu', function(Blueprint $table)
		{
			$table->integer('iFoodMenuId', true);
			$table->integer('iCompanyId')->index('iCompanyId');
			$table->string('vMenu_EN');
			$table->string('vMenu_FR');
			$table->string('vMenu_SW');
			$table->string('vMenu_ES');
			$table->string('vMenu_DE');
			$table->text('vMenuDesc_EN', 65535);
			$table->text('vMenuDesc_FR', 65535);
			$table->text('vMenuDesc_SW', 65535);
			$table->text('vMenuDesc_ES', 65535);
			$table->text('vMenuDesc_DE', 65535);
			$table->integer('iDisplayOrder');
			$table->string('vImage');
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
		Schema::drop('food_menu');
	}

}
