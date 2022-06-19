<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'account_no',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'username');
    }
}
