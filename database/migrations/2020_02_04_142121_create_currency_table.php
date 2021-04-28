<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('currency', function(Blueprint $table)
		{
			$table->integer('iCurrencyId', true);
			$table->string('vName', 10);
			$table->string('vSymbol', 20);
			$table->integer('iDispOrder');
			$table->enum('eDefault', array('Yes','No'))->default('No');
			$table->float('Ratio', 10, 4);
			$table->float('fThresholdAmount', 13, 6)->comment('Admin will enter min currency value for driver to be request');
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
		Schema::drop('currency');
	}

}
