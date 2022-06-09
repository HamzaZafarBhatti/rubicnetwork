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
        Schema::table('plans', function (Blueprint $table) {
            //
            $table->dropColumn('fb_share_amount');
            $table->dropColumn('min_trade_profit_wd');
            $table->dropColumn('min_trade_profit_wd_cycle');
            $table->integer('viral_share_bonus');
            $table->integer('min_viral_share_earning_wd');
            $table->integer('min_viral_share_earning_wd_cycle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            //
            $table->integer('fb_share_amount');
            $table->integer('min_trade_profit_wd');
            $table->integer('min_trade_profit_wd_cycle');
            $table->dropColumn('viral_share_bonus');
            $table->dropColumn('min_viral_share_earning_wd');
            $table->dropColumn('min_viral_share_earning_wd_cycle');
        });
    }
};
