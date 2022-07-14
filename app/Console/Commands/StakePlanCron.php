<?php

namespace App\Console\Commands;

use App\Models\StakePlan;
use App\Models\User;
use App\Models\UserStakePlan;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class StakePlanCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stakeplan:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start User Stake Plan Cron Job';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Log::info("Cron is working fine!");

        $user_stake_plans = UserStakePlan::whereStatus(1)->get();
        // Log::info($user);
        foreach ($user_stake_plans as $user_stake_plan) {
            $stake_plan = StakePlan::find($user_stake_plan->stake_plan_id);
            // Log::info($user_stake_plan->remaining_days);
            if ($user_stake_plan->remaining_days) {
                if (Carbon::parse($user_stake_plan->next_update_time) < Carbon::now()) {
                    $bonus = $stake_plan->percent * $stake_plan->amount / 100;
                    $user_stake_plan->update([
                        'stake_profit' => $user_stake_plan->stake_profit + $bonus,
                        'next_update_time' => Carbon::now()->addDay(),
                        // 'next_update_time' => Carbon::now()->addMinute(),
                        'remaining_days' => $user_stake_plan->remaining_days - 1
                    ]);
                }
            }
            if (!$user_stake_plan->remaining_days) {
                $user = User::find($user_stake_plan->user_id);
                $user->update(['stake_profit' => $user->stake_profit + $user_stake_plan->stake_profit]);
                $user_stake_plan->update([
                    'status' => 0,
                    'is_withdrawn' => 1,
                ]);
            }
        }
    }
}
