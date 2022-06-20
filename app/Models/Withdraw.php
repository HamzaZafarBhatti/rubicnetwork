<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function bankName(): Attribute
    {
        return Attribute::make(
            get: function () {
                return User::where('account_no', $this->account_no)->first()->bank->name;
            },
        );
    }


}
