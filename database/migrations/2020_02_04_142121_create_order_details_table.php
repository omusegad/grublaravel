<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_details', function(Blueprint $table)
		{
			$table->integer('iOrderDetailId', true);
			$table->integer('iOrderId')->default(0)->index('iOrderId');
			$table->integer('iFoodMenuId');
			$table->integer('iMenuItemId');
			$table->float('fOriginalPrice', 10, 0)->default(0);
			$table->float('fDiscountPrice', 10, 0)->default(0);
			$table->float('fPrice', 10, 0)->default(0);
			$table->string('vOptionId', 100);
			$table->string('vOptionPrice', 200)->default('0');
			$table->string('vAddonId', 100);
			$table->string('vAddonPrice', 200);
			$table->float('fSubTotal', 10, 0)->default(0);
			$table->integer('iQty')->default(0);
			$table->float('fTotalDiscountPrice', 10, 0)->default(0);
			$table->float('fTotalPrice', 10, 0)->default(0);
			$table->date('dDate')->default('0000-00-00');
			$table->enum('eAvailable', array('Yes','No'))->default('Yes');
			$table->text('tOptionAddonAttribute', 65535);
			$table->text('tOptionIdOrigPrice', 65535);
			$table->text('tAddOnIdOrigPrice', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_details');
	}

}
