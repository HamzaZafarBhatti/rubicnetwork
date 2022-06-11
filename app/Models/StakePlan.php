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
        'status',
        'ref_percent',
        'image',
        'amount',
        'return_capital',
        'stake_profit_transfer',
        'stake_profit_transfer_cycle',
        'stake_wallet_wd',
        'stake_wallet_wd_cycle',
        'ref_earning_transfer',
        'ref_earning_transfer_cycle',
        'code_prefix',
        'code_length',
    ];
}
