<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StakeCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'status',
        'stake_plan_id',
    ];

    public function plan() {
        return $this->belongsTo(StakePlan::class, 'stake_plan_id');
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
