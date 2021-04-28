<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrescriptionImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prescription_images', function(Blueprint $table)
		{
			$table->integer('iImageId', true);
			$table->integer('iUserId');
			$table->string('duplicate_id', 50);
			$table->string('vImage');
			$table->timestamp('tAddedDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('tModifiedDate')->default('0000-00-00 00:00:00');
			$table->enum('eStatus', array('Active','Inactive'))->default('Active')->comment('Active,Inactive');
			$table->integer('order_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prescription_images');
	}

}
