<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_log', function(Blueprint $table)
		{
			$table->integer('iMemberLogId', true);
			$table->integer('iMemberId');
			$table->enum('eMemberType', array('Passenger','Driver','Company','Hotel'));
			$table->enum('eMemberLoginType', array('AppLogin','WebLogin'));
			$table->enum('eDeviceType', array('Android','Ios','Web'))->default('Web');
			$table->timestamp('dDateTime')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('vIP');
			$table->enum('eAutoLogin', array('Yes','No'))->default('No');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_log');
	}

}
