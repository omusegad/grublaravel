<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHelpDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('help_detail', function(Blueprint $table)
		{
			$table->integer('iHelpDetailId', true);
			$table->integer('iHelpDetailCategoryId');
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
			$table->enum('eShowDetail', array('Yes','No'))->default('No');
			$table->enum('eSystem', array('General','DeliverAll'))->default('General');
			$table->text('vTitle_BR', 65535);
			$table->string('tAnswer_BR', 500);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('help_detail');
	}

}
