<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClubStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('club_stores', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('club_cooporate_id')->unsigned()->index('club_stores_club_cooporate_id_foreign');
			$table->string('storeName', 191);
			$table->string('contactName', 191);
			$table->string('location', 191);
			$table->string('locationLat', 191);
			$table->string('locationLong', 191);
			$table->string('email', 191)->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->string('password', 191);
			$table->string('phoneNumber', 191);
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
		Schema::drop('club_stores');
	}

}
