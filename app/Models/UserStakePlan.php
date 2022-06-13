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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stake_plan()
    {
        return $this->belongsTo(StakePlan::class)->select('id', 'name', 'duration');
    }

    public function stake_coupon()
    {
        return $this->belongsTo(StakeCoupon::class);
    }
}
