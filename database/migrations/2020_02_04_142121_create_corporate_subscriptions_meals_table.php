<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateSubscriptionsMealsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_subscriptions_meals', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('corporate_subscriptions_id')->unsigned();
			$table->string('meal_name', 191);
			$table->string('meal_image_ur', 191);
			$table->text('description', 65535)->nullable();
			$table->enum('inStock', array('YES','NO'))->default('YES');
			$table->float('price');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corporate_subscriptions_meals');
	}

}
