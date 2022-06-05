<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('site_name');
            $table->mediumText('site_desc');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->integer('balance_reg');
            $table->boolean('email_notify');
            $table->boolean('sms_notify');
            $table->boolean('email_verification');
            $table->boolean('sms_verification');
            $table->boolean('registration');
            $table->integer('withdraw_charge');
            $table->dateTime('withdraw_start');
            $table->dateTime('withdraw_end');
            $table->integer('coupon_code_rate');
            $table->integer('upgrade_status');
            $table->integer('upgrade_fee');
            $table->integer('transfer_fee');
            $table->integer('max_transfer');
            $table->integer('data_withdraw_limit');
            $table->integer('extract_user_limit');
            $table->integer('data_user_limit');
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
        Schema::dropIfExists('settings');
    }
};
