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
        'extraction_transfer',
        'extraction_transfer_start',
        'extraction_transfer_end',
        'viral_share_transfer',
        'viral_share_transfer_start',
        'viral_share_transfer_end',
        'ref_earning_transfer',
        'ref_earning_transfer_start',
        'ref_earning_transfer_end',
        'indirect_ref_earning_transfer',
        'indirect_ref_earning_transfer_start',
        'indirect_ref_earning_transfer_end',
        'stake_ref_earning_transfer',
        'stake_ref_earning_start',
        'stake_ref_earning_end',
        'upgrade_status',
        'upgrade_fee',
    ];
}
