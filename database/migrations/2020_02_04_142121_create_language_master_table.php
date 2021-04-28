<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguageMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('language_master', function(Blueprint $table)
		{
			$table->integer('iLanguageMasId', true);
			$table->string('vTitle', 50);
			$table->string('vTitle_EN', 50);
			$table->string('vCode', 5);
			$table->string('vGMapLangCode', 5)->default('en');
			$table->string('vLangCode', 5);
			$table->string('vCurrencyCode', 100);
			$table->string('vCurrencySymbol', 50);
			$table->integer('iDispOrder');
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
			$table->enum('eDefault', array('Yes','No'))->default('No');
			$table->enum('eDirectionCode', array('rtl','ltr'))->default('ltr');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('language_master');
	}

}
