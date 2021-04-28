<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoodMenuImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food_menu_images', function(Blueprint $table)
		{
			$table->integer('iFoodMenuImageId', true);
			$table->integer('iFoodMenuId');
			$table->string('vImageName');
			$table->dateTime('dDateAdded');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('food_menu_images');
	}

}
