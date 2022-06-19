<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StakeWithdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'account_no',
        'withdraw_to',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'username');
    }
}
