<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::create([
            'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, sit',
            'site_name' => 'Rubic Network',
            'site_desc' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad dicta omnis commodi quaerat magnam fuga quam cum facere animi eveniet. Tenetur sint quam deleniti commodi quaerat repellendus nobis iure laborum!',
            'email' => 'support@rubicnetwork.com',
            'mobile' => '+2347087394692',
            'address' => 'NBCC Plaza, Olubunmi Owa Street, Lekki Phase 1, Lekki, Lagos.',
            'balance_reg' => 700,
            'email_notify' => 1,
            'sms_notify' => 0,
            'email_verification' => 0,
            'sms_verification' => 0,
            'registration' => 1,
            'withdraw_charge' => 0,
            'withdraw_start' => now(),
            'withdraw_end' => now(),
            // 'min_withdraw_wallet' => '',
            // 'min_withdraw_wallet' => '',
            // 'min_transfer_viral_share' => '',
            // 'min_transfer_ref_earning' => '',
            // 'min_transfer_ext_balance' => '',
            // 'min_transfer_indirect_referral' => '',
            'coupon_code_rate' => 100,
            'upgrade_status' => 0,
            'upgrade_fee' => 0,
            'transfer_fee' => 0,
            'max_transfer' => 0,
            'data_withdraw_limit' => 0,
            'extract_user_limit' => 0,
            'data_user_limit' => 0,
        ]);
    }
}
