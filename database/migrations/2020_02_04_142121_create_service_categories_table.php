<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_categories', function(Blueprint $table)
		{
			$table->integer('iServiceId', true);
			$table->string('vService')->unique('SERVICE_NAME')->comment('This will be used for theme setup. Don\'t change values. This should be unique.');
			$table->string('vServiceName_EN');
			$table->string('vServiceName_FR');
			$table->string('vServiceName_SW');
			$table->string('vServiceName_ES');
			$table->string('vServiceName_DE');
			$table->integer('iDisplayOrder');
			$table->string('vImage')->comment('Image must be in the ratio of "16:9". Minimum resolution is 2880*1620.');
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
			$table->enum('eType', array('separate','combine'))->default('separate');
			$table->enum('prescription_required', array('Yes','No'))->default('No');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('service_categories');
	}

}
