<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLangConversionProcessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lang_conversion_process', function(Blueprint $table)
		{
			$table->integer('iProcessId', true);
			$table->string('vTableName')->unique('UNIQUE_TABLE');
			$table->integer('iRecord');
			$table->enum('eStatus', array('Pending','In Progress','Done'))->default('Pending');
			$table->timestamp('tStartDateTime')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('tEndDateTime')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lang_conversion_process');
	}

}
