<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDocumentListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_list', function(Blueprint $table)
		{
			$table->integer('doc_id', true);
			$table->integer('doc_masterid');
			$table->enum('doc_usertype', array('company','driver','car','store'));
			$table->integer('doc_userid');
			$table->date('ex_date');
			$table->string('doc_file', 200);
			$table->enum('status', array('Active','Inactive','Deleted'))->default('Active');
			$table->timestamp('edate')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('document_list');
	}

}
