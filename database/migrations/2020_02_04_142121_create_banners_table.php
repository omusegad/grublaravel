<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banners', function(Blueprint $table)
		{
			$table->integer('iFaqcategoryId', true);
			$table->integer('iServiceId')->default(0);
			$table->enum('eStatus', array('Active','Inactive'))->nullable()->default('Active');
			$table->integer('iDisplayOrder');
			$table->string('vTitle', 100)->nullable();
			$table->string('vImage', 100);
			$table->string('vCode', 100);
			$table->integer('iUniqueId');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banners');
	}

}
