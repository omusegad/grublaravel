<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguageLabelOtherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('language_label_other', function(Blueprint $table)
		{
			$table->integer('LanguageLabelId', true);
			$table->integer('lPage_id');
			$table->string('vCode', 5);
			$table->string('vLabel', 100);
			$table->text('vValue', 65535);
			$table->string('vScreen', 100);
			$table->enum('eDeviceType', array('APP','WEB'))->default('APP');
			$table->enum('eScript', array('Yes','No'))->default('No');
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
			$table->enum('eAppType', array('General','Ride','Delivery','Ride-Delivery','UberX','Multi-Delivery','DeliverAll','Kiosk'))->default('General');
			$table->enum('eProcessed', array('Yes','No'))->default('No');
			$table->enum('eInProcess', array('Yes','No'))->default('No');
			$table->unique(['vCode','vLabel'], 'UNIQUE_LABEL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('language_label_other');
	}

}
