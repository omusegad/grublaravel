<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhoneverificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phoneverification', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('phoneNumber', 191);
			$table->string('HashString', 191);
			$table->string('verification_code', 191)->unique();
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
		Schema::drop('phoneverification');
	}

}
