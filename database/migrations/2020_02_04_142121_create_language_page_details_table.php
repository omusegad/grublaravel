<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguagePageDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('language_page_details', function(Blueprint $table)
		{
			$table->integer('lp_id', true);
			$table->string('lp_name');
			$table->string('lp_link');
			$table->string('vDescription', 500);
			$table->enum('lp_type', array('web','driver','rider'))->default('web');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('language_page_details');
	}

}
