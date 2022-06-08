<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StakePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'percent',
        'duration',
        'period',
        'amount',
        'status',
        'ref_percent',
        'hashrate',
        'image',
        'upgrade',
        'fb_share_amount',
        'indirect_ref_com',
        'min_trade_profit_wd',
        'min_trade_profit_wd_cycle',
        'min_account_balance_wd',
        'min_account_balance_wd_cycle',
        'min_ref_earn_wd',
        'min_ref_earn_wd_cycle',
        'code_prefix',
        'code_length',
        'convert_rate',
        'active_period',
        'extraction_plan_time',
    ];
}
