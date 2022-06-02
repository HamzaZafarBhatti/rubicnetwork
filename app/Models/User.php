<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function deposit()
    {
        return $this->hasMany('App\Model\Deposit', 'user_id');
    }
    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'sender_id');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function data_operator()
    {
        return $this->belongsTo(DataOperator::class);
    }
    public function child_reference()
    {
        return $this->belongsToMany(User::class, Referral::class, 'ref_id', 'user_id');
    }
    public function parent_reference()
    {
        return $this->belongsToMany(User::class, Referral::class, 'user_id', 'ref_id')->withPivot('is_direct');
    }
}
