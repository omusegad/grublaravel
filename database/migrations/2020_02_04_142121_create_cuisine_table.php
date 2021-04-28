<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuisineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuisine', function(Blueprint $table)
		{
			$table->integer('cuisineId', true);
			$table->integer('iServiceId')->default(1)->comment('linked to service_categories table');
			$table->string('cuisineName');
			$table->string('cuisineName_EN');
			$table->string('cuisineName_FR');
			$table->string('cuisineName_SW');
			$table->string('cuisineName_ES');
			$table->string('cuisineName_DE');
			$table->enum('eStatus', array('Active','Inactive','Deleted'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuisine');
	}

}
