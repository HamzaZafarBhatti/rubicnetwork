<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $plans = array(
            array('id' => '6', 'name' => 'MONOCHAIN', 'percent' => '0.12', 'duration' => '3', 'period' => 'month', 'amount' => '3500', 'status' => '1', 'ref_percent' => '39', 'hashrate' => '5Ph/s - Manual Mining', 'image' => 'plan_1648118257.png', 'upgrade' => '7000', 'fb_share_amount' => '60', 'indirect_ref_com' => '2', 'min_trade_profit_wd' => '3000', 'min_trade_profit_wd_cycle' => '30', 'min_account_balance_wd' => '20000', 'min_account_balance_wd_cycle' => '30', 'min_ref_earn_wd' => '5000', 'min_ref_earn_wd_cycle' => '1', 'code_prefix' => 'M000', 'code_length' => '24', 'convert_rate' => '1', 'active_period' => '7', 'extraction_plan_time' => '2', 'created_at' => '2022-06-04 06:26:38', 'updated_at' => '2022-06-04 06:26:38'),
            array('id' => '7', 'name' => 'DRAGONMINT', 'percent' => '0.7', 'duration' => '3', 'period' => 'month', 'amount' => '7500', 'status' => '0', 'ref_percent' => '39', 'hashrate' => '10Ph/s - Manual Mining', 'image' => 'plan_1648118289.png', 'upgrade' => '7500', 'fb_share_amount' => '150', 'indirect_ref_com' => '2.5', 'min_trade_profit_wd' => '4500', 'min_trade_profit_wd_cycle' => '30', 'min_account_balance_wd' => '40000', 'min_account_balance_wd_cycle' => '30', 'min_ref_earn_wd' => '5000', 'min_ref_earn_wd_cycle' => '1', 'code_prefix' => 'D000', 'code_length' => '24', 'convert_rate' => '1', 'active_period' => '7', 'extraction_plan_time' => '0', 'created_at' => '2022-06-03 12:31:34', 'updated_at' => '2022-06-03 12:31:34'),
            array('id' => '10', 'name' => 'RUBICHAIN', 'percent' => '0.7', 'duration' => '4', 'period' => 'month', 'amount' => '15000', 'status' => '1', 'ref_percent' => '40', 'hashrate' => '15Ph/s - Auto Mining', 'image' => 'plan_1648118311.png', 'upgrade' => '15000', 'fb_share_amount' => '350', 'indirect_ref_com' => '5', 'min_trade_profit_wd' => '10500', 'min_trade_profit_wd_cycle' => '30', 'min_account_balance_wd' => '60000', 'min_account_balance_wd_cycle' => '30', 'min_ref_earn_wd' => '5000', 'min_ref_earn_wd_cycle' => '1', 'code_prefix' => 'P000', 'code_length' => '24', 'convert_rate' => '1', 'active_period' => '7', 'extraction_plan_time' => '12', 'created_at' => '2022-06-04 06:36:21', 'updated_at' => '2022-06-04 06:36:21')
        );

        Plan::insert($plans);
    }
}
