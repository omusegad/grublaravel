<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faq_categories', function(Blueprint $table)
		{
			$table->integer('iFaqcategoryId', true);
			$table->enum('eStatus', array('Active','Inactive'))->nullable()->default('Active');
			$table->integer('iDisplayOrder');
			$table->string('vTitle', 100)->nullable();
			$table->string('vImage', 100);
			$table->string('vCode', 100);
			$table->integer('iUniqueId');
			$table->enum('eCategoryType', array('General','Passenger','Driver'))->default('General');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('faq_categories');
	}

}
