<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuitemOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menuitem_options', function(Blueprint $table)
		{
			$table->integer('iOptionId', true);
			$table->integer('iMenuItemId');
			$table->string('vOptionName');
			$table->float('fPrice', 10, 0);
			$table->enum('eOptionType', array('Options','Addon'));
			$table->enum('eDefault', array('Yes','No'))->default('No');
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
		Schema::drop('menuitem_options');
	}

}
