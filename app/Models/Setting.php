<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'stake_ref_earning_transfer_start',
        'stake_ref_earning_transfer_end',
        'upgrade_status',
        'upgrade_fee',
        'ngn_rate',
        'usdt_rate',
    ];

    // protected $casts = [
    //     'extraction_transfer_start' => 'datetime',
    //     'extraction_transfer_end' => 'datetime',
    //     'viral_share_transfer_start' => 'datetime',
    //     'viral_share_transfer_end' => 'datetime',
    //     'ref_earning_transfer_start' => 'datetime',
    //     'ref_earning_transfer_end' => 'datetime',
    //     'indirect_ref_earning_transfer_start' => 'datetime',
    //     'indirect_ref_earning_transfer_end' => 'datetime',
    // ];

    protected function extractionTransferStartFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->extraction_transfer_start)->format('F j, Y h:i A'),
        );
    }

    protected function extractionTransferEndFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->extraction_transfer_end)->format('F j, Y h:i A'),
        );
    }

    protected function viralShareTransferStartFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($viral_share_transfer_start) => Carbon::parse($viral_share_transfer_start)->format('F j, Y h:i A'),
        );
    }

    protected function viralShareTransferEndFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($viral_share_transfer_end) => Carbon::parse($viral_share_transfer_end)->format('F j, Y h:i A'),
        );
    }

    protected function refEarningTransferStartFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($ref_earning_transfer_start) => Carbon::parse($ref_earning_transfer_start)->format('F j, Y h:i A'),
        );
    }

    protected function refEarningTransferEndFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($ref_earning_transfer_end) => Carbon::parse($ref_earning_transfer_end)->format('F j, Y h:i A'),
        );
    }

    protected function indirectRefEarningTransferStartFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($indirect_ref_earning_transfer_start) => Carbon::parse($indirect_ref_earning_transfer_start)->format('F j, Y h:i A'),
        );
    }

    protected function indirectRefEarningTransferEndFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($indirect_ref_earning_transfer_end) => Carbon::parse($indirect_ref_earning_transfer_end)->format('F j, Y h:i A'),
        );
    }

    protected function stakeRefEarningTransferStartFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($stake_ref_earning_transfer_start) => Carbon::parse($stake_ref_earning_transfer_start)->format('F j, Y h:i A'),
        );
    }

    protected function stakeRefEarningTransferEndFormatted(): Attribute
    {
        return Attribute::make(
            get: fn ($stake_ref_earning_transfer_end) => Carbon::parse($stake_ref_earning_transfer_end)->format('F j, Y h:i A'),
        );
    }
}
