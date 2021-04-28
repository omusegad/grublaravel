<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCorporategroupTemporaryUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corporategroup_temporary_users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('reference_code', 191);
			$table->string('groupName', 191);
			$table->string('fname', 191)->nullable();
			$table->string('lname', 191)->nullable();
			$table->string('phoneNumber', 191)->nullable();
			$table->string('email', 191)->nullable();
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
		Schema::drop('corporategroup_temporary_users');
	}

}
