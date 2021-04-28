<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faqs', function(Blueprint $table)
		{
			$table->integer('iFaqId', true);
			$table->integer('iFaqcategoryId');
			$table->enum('eStatus', array('Active','Inactive'))->nullable()->default('Active');
			$table->integer('iDisplayOrder');
			$table->text('vTitle_EN', 65535)->nullable();
			$table->text('vTitle_FR', 65535);
			$table->text('vTitle_SW', 65535);
			$table->text('vTitle_ES', 65535);
			$table->text('vTitle_DE', 65535);
			$table->text('tAnswer_EN', 65535)->nullable();
			$table->text('tAnswer_FR', 65535);
			$table->text('tAnswer_SW', 65535);
			$table->text('tAnswer_ES', 65535);
			$table->text('tAnswer_DE', 65535);
			$table->enum('eTopic', array('Front','Admin','RiderApp','DriverApp','General'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('faqs');
	}

}
