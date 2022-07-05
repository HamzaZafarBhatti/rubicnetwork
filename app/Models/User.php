<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'name',
        'rubic_wallet',
        'rubic_stake_wallet',
        'stake_ref_earning',
        'stake_profit',
        'extraction_balance',
        'ref_earning',
        'indirect_ref_earning',
        'viral_share_earning',
        'email_verified_at',
        'image',
        'phone',
        'country',
        'address',
        'city',
        'zip_code',
        'status',
        'ip_address',
        'last_login',
        'pin',
        'verification_code',
        'sms_code',
        'phone_verify',
        'email_verify',
        'email_time',
        'phone_time',
        'upgrade',
        'googlefa_secret',
        'fa_status',
        'coupon_id',
        'plan_id',
        'bank_id',
        'account_no',
        'account_name',
        'account_type',
        'phone_number',
        'activated_at',
        'tether_network',
        'tether_address',
        'show_popup',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    // public function deposit()
    // {
    //     return $this->hasMany('App\Model\Deposit', 'user_id');
    // }
    // public function transfers()
    // {
    //     return $this->hasMany(Transfer::class, 'sender_id');
    // }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function data_operator()
    {
        return $this->belongsTo(DataOperator::class);
    }
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    public function stake_plans()
    {
        return $this->belongsToMany(StakePlan::class, UserStakePlan::class, 'user_id', 'stake_plan_id');
    }
    public function user_stake_plans()
    {
        return $this->hasMany(UserStakePlan::class);
    }
    public function completed_stake_plans()
    {
        return $this->belongsToMany(StakePlan::class, UserStakePlan::class, 'user_id', 'stake_plan_id')->wherePivot('status', 0);
    }
    public function user_stake_withdrawals()
    {
        return $this->hasMany(StakeWithdraw::class);
    }
    public function user_withdrawals()
    {
        return $this->hasMany(Withdraw::class);
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
    // public function child_reference()
    // {
    //     return $this->belongsToMany(User::class, Referral::class, 'ref_id', 'user_id');
    // }
    public function parent()
    {
        return $this->belongsToMany(User::class, Referral::class, 'referral_id', 'referee_id');
    }

    protected function tetherNetworkLabel(): Attribute
    {
        return Attribute::make(
            get: function ($tether_network) {
                if($tether_network == 'bep') {
                    return 'BEP-20';
                } else if($tether_network == 'trc') {
                    return 'TRC-20';
                } else {
                    return 'ERC-20';
                }
            },
        );
    }
}
