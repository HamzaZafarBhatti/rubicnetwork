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
        Schema::create('stake_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('percent');
            $table->integer('duration');
            $table->string('period');
            $table->integer('amount');
            $table->boolean('status');
            $table->float('ref_percent');
            $table->string('hashrate');
            $table->text('image');
            $table->integer('upgrade');
            $table->integer('fb_share_amount');
            $table->float('indirect_ref_com');
            $table->integer('min_trade_profit_wd');
            $table->integer('min_trade_profit_wd_cycle');
            $table->integer('min_account_balance_wd');
            $table->integer('min_account_balance_wd_cycle');
            $table->integer('min_ref_earn_wd');
            $table->integer('min_ref_earn_wd_cycle');
            $table->string('code_prefix');
            $table->integer('code_length');
            $table->integer('convert_rate');
            $table->integer('active_period');
            $table->integer('extraction_plan_time');
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
        Schema::dropIfExists('stake_plans');
    }
};
