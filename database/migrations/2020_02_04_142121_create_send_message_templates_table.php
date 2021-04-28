<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSendMessageTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('send_message_templates', function(Blueprint $table)
		{
			$table->integer('iSendMessageId', true);
			$table->string('vEmail_Code', 500)->nullable();
			$table->text('vPurpose', 65535);
			$table->enum('eMIME', array('html','text'))->nullable();
			$table->enum('vSection', array('Job Seeker','Artist','Franchisee','Employer'))->nullable();
			$table->enum('eStatus', array('Active','Inactive'))->default('Active');
			$table->text('vSubject_EN', 65535)->nullable();
			$table->text('vSubject_FR', 65535);
			$table->text('vSubject_SW', 65535);
			$table->text('vSubject_ES', 65535);
			$table->text('vSubject_DE', 65535);
			$table->text('vBody_EN', 65535)->nullable();
			$table->text('vBody_FR', 65535);
			$table->text('vBody_SW', 65535);
			$table->text('vBody_ES', 65535);
			$table->text('vBody_DE', 65535);
			$table->enum('eSystem', array('General','DeliverAll'))->default('General');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('send_message_templates');
	}

}
