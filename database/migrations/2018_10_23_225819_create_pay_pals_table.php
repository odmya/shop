<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayPalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_pals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paymentinfo_transactionid');
            $table->string('token')->nullable();
            $table->string('payer_id')->nullable();
            $table->string('payer_email')->nullable();
            $table->string('invoice')->nullable();
            $table->string('txn_id')->nullable();
            $table->string('correlationid')->nullable();
            $table->string('paymentinfo_transactiontype')->nullable();
            $table->string('paymentinfo_paymenttype')->nullable();
            $table->string('paymentinfo_ordertime')->nullable();
            $table->string('paymentinfo_amt')->nullable();
            $table->string('paymentinfo_feeamt')->nullable();
            $table->string('paymentinfo_taxamt')->nullable();
            $table->string('paymentinfo_currencycode')->nullable();
            $table->string('paymentinfo_paymentstatus')->nullable();
            $table->string('paymentinfo_protectioneligibility')->nullable();
            $table->string('paymentinfo_protectioneligibilitytype')->nullable();
            $table->string('paymentinfo_sellerpaypalaccountid')->nullable();
            $table->string('paymentinfo_securemerchantaccountid')->nullable();
            $table->string('paymentinfo_errorcode')->nullable();
            $table->string('paymentinfo_ack')->nullable();


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
        Schema::dropIfExists('pay_pals');
    }
}
