<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentMasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_master', function(Blueprint $table)
		{
			$table->integer('doc_masterid', true);
			$table->enum('doc_usertype', array('company','driver','car','store'));
			$table->string('doc_name', 50);
			$table->string('country', 10);
			$table->enum('ex_status', array('yes','no'));
			$table->enum('status', array('Active','Inactive','Deleted'))->default('Active');
			$table->timestamp('doc_instime')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('doc_name_EN', 50);
			$table->string('doc_name_FR', 50);
			$table->string('doc_name_SW', 50);
			$table->string('doc_name_ES', 50);
			$table->string('doc_name_DE', 50);
			$table->enum('eType', array('Ride','Delivery','UberX'))->default('Ride');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('document_master');
	}

}
