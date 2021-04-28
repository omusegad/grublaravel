<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_request', function(Blueprint $table)
		{
			$table->integer('iDriverRequestId', true);
			$table->integer('iOrderId');
			$table->integer('iRequestId');
			$table->integer('iDriverId');
			$table->integer('iUserId');
			$table->integer('iTripId');
			$table->enum('eStatus', array('Decline','Accept','Timeout','Received','Sent'))->default('Timeout');
			$table->enum('eAcceptAttempted', array('Yes','No'))->default('No');
			$table->timestamp('tDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('vMsgCode', 65535);
			$table->text('vStartLatlong', 65535);
			$table->text('vEndLatlong', 65535);
			$table->text('tStartAddress', 65535);
			$table->text('tEndAddress', 65535);
			$table->dateTime('dAddedDate');
			$table->enum('eReceivedByPubSub', array('Yes','No'))->default('No');
			$table->dateTime('dPunSubDate')->default('0000-00-00 00:00:00');
			$table->enum('eReceivedByPush', array('Yes','No'))->default('No');
			$table->dateTime('dPushDate')->default('0000-00-00 00:00:00');
			$table->enum('eReceivedByScript', array('Yes','No'))->default('No');
			$table->dateTime('dScriptDate')->default('0000-00-00 00:00:00');
			$table->enum('eFromDevice', array('Android','Ios'))->comment('From device type. (Generally, passenger\'s device type)');
			$table->enum('eToDevice', array('Android','Ios'))->comment('To device type. (Generally, driver\'s device type)');
			$table->enum('eSent', array('Yes','No'))->default('No')->comment('This will be yes when passenger sent a request.');
			$table->dateTime('dSentDate')->default('0000-00-00 00:00:00')->comment('Date when passenger sent a request');
			$table->enum('eTimeOut', array('Yes','No'))->default('No')->comment('This will be yes if driver received request is timeout.');
			$table->dateTime('dTimeOutDate')->default('0000-00-00 00:00:00')->comment('Date when driver received request is timeout. This field must be in server\'s time zone not user\'s device time zone.');
			$table->enum('eReceived', array('Yes','No'))->default('No')->comment('This field must be ignored in every case. Should not use for report. This is for internal use only');
			$table->enum('eOpened', array('Yes','No'))->default('No')->comment('This will be yes if driver opens request.');
			$table->dateTime('dOpenedDate')->default('0000-00-00 00:00:00')->comment('Date when driver opens request. This field must be in server\'s timezone not in user\'s device timezone.');
			$table->enum('eAccept', array('Yes','No'))->default('No')->comment('This will be yes if driver accepts request.');
			$table->dateTime('dAcceptDate')->default('0000-00-00 00:00:00')->comment('Date when driver declines request. This must be in server\'s timezone not user\'s device time zone.');
			$table->enum('eDecline', array('Yes','No'))->default('No')->comment('This will be yes if driver accepts request. This field must be in server\'s time zone not user\'s device time zone');
			$table->dateTime('dDeclineDate')->default('0000-00-00 00:00:00')->comment('Date when driver declines request. This must be in server\'s timezone not user\'s device time zone.');
			$table->enum('eDiscardByApp', array('Yes','No'))->default('No')->comment('This will be yes if app discards request.');
			$table->dateTime('dDiscardByApp')->default('0000-00-00 00:00:00')->comment('Date when server discards request. This field must be in server time zone not user\'s device time zone. ');
			$table->enum('eDiscard', array('Yes','No'))->default('No')->comment('This will be yes if server discards request.');
			$table->dateTime('dDiscardDate')->default('0000-00-00 00:00:00')->comment('Date when server discards request.');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_request');
	}

}
