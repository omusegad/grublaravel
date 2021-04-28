<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavoriteStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favorite_store', function(Blueprint $table)
		{
			$table->integer('iFavstoreId', true);
			$table->integer('iUserId');
			$table->integer('iCompanyId');
			$table->enum('eIsFavourite', array('Yes','No'))->default('Yes');
			$table->dateTime('dFavDate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('favorite_store');
	}

}
