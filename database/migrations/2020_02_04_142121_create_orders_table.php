<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->integer('iOrderId', true);
			$table->integer('iServiceId')->comment('Linked to service_categories table');
			$table->integer('iUserId')->default(0)->index('iCustomerId');
			$table->integer('iDriverId');
			$table->integer('iCompanyId');
			$table->integer('iUserAddressId');
			$table->string('vTimeZone');
			$table->string('vOrderNo', 50)->default('')->index('vOrderNo');
			$table->timestamp('tOrderRequestDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('vUserEmail');
			$table->float('fSubTotal', 10, 0)->default(0);
			$table->float('fOffersDiscount', 10, 0)->default(0);
			$table->float('fPackingCharge', 10, 0)->default(0);
			$table->float('fDeliveryCharge', 10, 0);
			$table->float('fTax', 10, 0)->default(0);
			$table->string('vDiscount', 50)->default('0');
			$table->float('fDiscount', 10, 0)->default(0);
			$table->float('fCommision', 10, 0)->default(0);
			$table->float('fWalletDebit', 10, 0)->default(0);
			$table->float('fOutStandingAmount', 10, 0)->default(0);
			$table->float('fNetTotal', 10, 0)->default(0);
			$table->float('fTotalGenerateFare', 10, 0)->default(0);
			$table->string('vName', 50)->default('');
			$table->string('vLastName', 50)->default('');
			$table->string('vCompany')->nullable();
			$table->float('fMaxOfferAmt', 10, 0)->default(0);
			$table->float('fTargetAmt', 10, 0)->default(0);
			$table->float('fOfferAmt', 10, 0)->default(0);
			$table->enum('fOfferAppyType', array('None','First','All'));
			$table->enum('fOfferType', array('','Flat','Percentage'))->default('');
			$table->enum('ePaid', array('Yes','No'))->default('No');
			$table->string('iTransactionId', 100)->default('0');
			$table->text('vPaymentRemarks', 65535);
			$table->text('tPaymentResponse', 65535);
			$table->text('vInstruction', 65535);
			$table->string('vFromIP', 20)->default('');
			$table->string('vCouponCode', 20)->default('');
			$table->dateTime('dDate')->default('0000-00-00 00:00:00')->index('dDate');
			$table->enum('ePaymentOption', array('Cash','Card'))->default('Cash');
			$table->integer('iStatusCode')->default(1)->comment('linked with order_status table');
			$table->dateTime('dDeliveryDate');
			$table->enum('eCancelledBy', array('Driver','Passenger','Company','Admin'));
			$table->float('fCancellationCharge', 10, 0)->default(0);
			$table->integer('iCancelledById');
			$table->string('vCancelReason', 500);
			$table->integer('iReasonId');
			$table->float('fRefundAmount', 10, 0)->default(0);
			$table->float('fRestaurantPayAmount', 10, 0)->default(0);
			$table->float('fRestaurantPaidAmount', 10, 0)->default(0);
			$table->float('fDriverPaidAmount', 10, 0)->default(0);
			$table->enum('eRestaurantPaymentStatus', array('Settelled','Unsettelled'))->default('Unsettelled');
			$table->enum('eAdminPaymentStatus', array('Settelled','Unsettelled'))->default('Unsettelled');
			$table->float('fRatio_USD', 10, 4)->default(1.0000);
			$table->float('fRatio_RWF', 10)->default(0.00);
			$table->float('fRatio_TZS', 10)->default(0.00);
			$table->float('fRatio_KES', 10)->default(0.00);
			$table->float('fRatio_UGX', 10)->default(0.00);
			$table->enum('eCheckUserWallet', array('Yes','No'))->default('No');
			$table->enum('ePayWallet', array('Yes','No'))->default('No');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
