<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStakePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stake_plan_id',
        'status',
        'stake_coupon_id',
        'stake_profit',
        'is_withdrawn',
        'next_update_time',
        'remaining_days',
        'wallet_address_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stake_plan()
    {
        return $this->belongsTo(StakePlan::class)->select('id', 'name', 'duration', 'stake_profit_transfer');
    }

    public function wallet_address()
    {
        return $this->belongsTo(WalletAddress::class)->select('id', 'address');
    }

    public function tether_payment()
    {
        return $this->hasOne(TetherPayment::class);
    }

    public function stake_coupon()
    {
        return $this->belongsTo(StakeCoupon::class);
    }
}
