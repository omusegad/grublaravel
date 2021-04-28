<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHelpDetailCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('help_detail_categories', function(Blueprint $table)
		{
			$table->integer('iHelpDetailCategoryId', true);
			$table->enum('eStatus', array('Active','Inactive'))->nullable()->default('Active');
			$table->integer('iDisplayOrder');
			$table->string('vTitle', 100)->nullable();
			$table->string('vImage', 100);
			$table->string('vCode', 100);
			$table->integer('iUniqueId');
			$table->enum('eSystem', array('General','DeliverAll'))->default('General');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('help_detail_categories');
	}

}
