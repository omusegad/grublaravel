<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateSubscriptionsGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_subscriptions_groups', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('corporate_subscriptions_id')->unsigned();
			$table->string('subscription_group_name', 191);
			$table->string('contact_person', 191);
			$table->string('phoneNumber', 191);
			$table->string('location', 191)->nullable();
			$table->string('locationLat', 191)->nullable();
			$table->string('locationLong', 191)->nullable();
			$table->timestamps();
			$table->string('reference_code', 191);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('corporate_subscriptions_groups');
	}

}
