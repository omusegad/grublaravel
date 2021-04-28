<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeoSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seo_sections', function(Blueprint $table)
		{
			$table->integer('iId', true);
			$table->string('vPagename', 500);
			$table->string('vPagetitle', 500);
			$table->string('vMetakeyword', 500);
			$table->text('tDescription', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('seo_sections');
	}

}
