<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateSubscriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_subscriptions', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('subscriptions_name', 191);
			$table->string('subscriptions_image_url', 191);
			$table->string('email', 191)->unique();
			$table->string('phoneNumber', 191);
			$table->string('location', 191);
			$table->string('locationLat', 191)->nullable();
			$table->string('locationLong', 191)->nullable();
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
		Schema::drop('corporate_subscriptions');
	}

}
