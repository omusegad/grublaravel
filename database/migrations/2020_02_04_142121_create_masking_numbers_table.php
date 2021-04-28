<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaskingNumbersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('masking_numbers', function(Blueprint $table)
		{
			$table->integer('masknum_id', true);
			$table->string('mask_number', 100);
			$table->dateTime('adding_date');
			$table->string('vCountry', 50);
			$table->enum('eStatus', array('Active','Inactive'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('masking_numbers');
	}

}
