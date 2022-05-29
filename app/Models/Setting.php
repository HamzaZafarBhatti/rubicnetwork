<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'site_name',
        'site_desc',
        'email',
        'mobile',
        'address',
        'balance_reg',
        'email_notify',
        'sms_notify',
        'email_verification',
        'sms_verification',
        'registration',
        'withdraw_charge',
        'withdraw_start',
        'withdraw_end',
        // 'min_withdraw_wallet',
        // 'min_withdraw_wallet',
        // 'min_transfer_viral_share',
        // 'min_transfer_ref_earning',
        // 'min_transfer_ext_balance',
        // 'min_transfer_indirect_referral',
        'coupon_code_rate',
        'upgrade_status',
        'upgrade_fee',
        'transfer_fee',
        'max_transfer',
        'data_withdraw_limit',
        'extract_user_limit',
        'data_user_limit',
    ];
}
