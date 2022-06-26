<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'status',
        'plan_id',
    ];

    public function plan() {
        return $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
