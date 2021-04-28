<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporate_users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('reference_code', 191);
            $table->string('subscription_group_name', 191);
            $table->string('name')->nullable();
            $table->string('phoneNumber')->nullable();
			$table->bigInteger('iUserId')->unsigned();
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
		Schema::drop('corporate_users');
	}

}
