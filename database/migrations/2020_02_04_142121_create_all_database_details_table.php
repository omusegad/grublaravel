<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAllDatabaseDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('all_database_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('host_name', 50);
			$table->string('db_name', 50);
			$table->string('password', 50);
			$table->string('db_user', 50);
			$table->string('mls_name', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('all_database_details');
	}

}
