<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->integer('iPageId', true);
			$table->string('vPageName', 500)->nullable();
			$table->text('iFrameCode', 65535)->nullable();
			$table->string('vImage', 500)->nullable();
			$table->string('vImage1', 500);
			$table->string('vTitle', 500)->nullable();
			$table->text('tMetaKeyword', 65535)->nullable();
			$table->text('tMetaDescription', 65535)->nullable();
			$table->text('vPageTitle_EN', 65535)->nullable();
			$table->text('vPageTitle_FR', 65535);
			$table->text('vPageTitle_SW', 65535);
			$table->text('vPageTitle_ES', 65535);
			$table->text('vPageTitle_DE', 65535);
			$table->text('tPageDesc_EN', 65535)->nullable();
			$table->text('tPageDesc_FR', 65535);
			$table->text('tPageDesc_SW', 65535);
			$table->text('tPageDesc_ES', 65535);
			$table->text('tPageDesc_DE', 65535);
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
			$table->integer('iOrderBy');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}
