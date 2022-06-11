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
        Schema::table('stake_plans', function (Blueprint $table) {
            //
            $table->boolean('return_capital');
            $table->integer('stake_profit_transfer');
            $table->integer('stake_profit_transfer_cycle');
            $table->integer('stake_wallet_wd');
            $table->integer('stake_wallet_wd_cycle');
            $table->integer('ref_earning_transfer');
            $table->integer('ref_earning_transfer_cycle');
            $table->dropColumn('hashrate');
            $table->dropColumn('upgrade');
            $table->dropColumn('fb_share_amount');
            $table->dropColumn('indirect_ref_com');
            $table->dropColumn('min_trade_profit_wd');
            $table->dropColumn('min_trade_profit_wd_cycle');
            $table->dropColumn('min_account_balance_wd');
            $table->dropColumn('min_account_balance_wd_cycle');
            $table->dropColumn('min_ref_earn_wd');
            $table->dropColumn('min_ref_earn_wd_cycle');
            $table->dropColumn('convert_rate');
            $table->dropColumn('active_period');
            $table->dropColumn('extraction_plan_time');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stake_plans', function (Blueprint $table) {
            //
            $table->dropColumn('return_capital');
            $table->dropColumn('stake_profit_transfer');
            $table->dropColumn('stake_profit_transfer_cycle');
            $table->dropColumn('stake_wallet_wd');
            $table->dropColumn('stake_wallet_wd_cycle');
            $table->dropColumn('ref_earning_transfer');
            $table->dropColumn('ref_earning_transfer_cycle');
            $table->string('hashrate');
            $table->integer('upgrade');
            $table->integer('fb_share_amount');
            $table->float('indirect_ref_com');
            $table->integer('min_trade_profit_wd');
            $table->integer('min_trade_profit_wd_cycle');
            $table->integer('min_account_balance_wd');
            $table->integer('min_account_balance_wd_cycle');
            $table->integer('min_ref_earn_wd');
            $table->integer('min_ref_earn_wd_cycle');
            $table->integer('convert_rate');
            $table->integer('active_period');
            $table->integer('extraction_plan_time');
        });
    }
};
