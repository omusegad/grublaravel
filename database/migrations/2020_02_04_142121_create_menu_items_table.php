<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_items', function(Blueprint $table)
		{
			$table->integer('iMenuItemId', true);
			$table->integer('iFoodMenuId')->default(0);
			$table->string('vItemType_EN');
			$table->string('vItemType_FR');
			$table->string('vItemType_SW');
			$table->string('vItemType_ES');
			$table->string('vItemType_DE');
			$table->text('vItemDesc_EN', 65535);
			$table->text('vItemDesc_FR', 65535);
			$table->text('vItemDesc_SW', 65535);
			$table->text('vItemDesc_ES', 65535);
			$table->text('vItemDesc_DE', 65535);
			$table->float('fPrice', 10, 0);
			$table->enum('eFoodType', array('Veg','NonVeg',''))->default('');
			$table->float('fOfferAmt', 10, 0)->default(0);
			$table->string('vImage');
			$table->integer('iDisplayOrder');
			$table->enum('eStatus', array('Active','Inactive','Deleted'))->default('Active');
			$table->enum('eAvailable', array('Yes','No'))->default('Yes');
			$table->enum('eBestSeller', array('Yes','No'))->default('No');
			$table->enum('eRecommended', array('Yes','No'))->default('No');
			$table->string('vHighlightName');
			$table->enum('prescription_required', array('Yes','No'))->default('No');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu_items');
	}

}
