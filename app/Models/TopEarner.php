<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopEarner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'amount',
        'status',
        'type' //stake(0) or rubic(1)
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
