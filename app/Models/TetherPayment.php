<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TetherPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'hash',
        'image',
        'user_stake_plan_id',
        'stake_plan_id',
        'user_id',
        'wallet_address_id',
    ];
}
