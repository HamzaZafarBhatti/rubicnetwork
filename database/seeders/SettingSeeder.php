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
            'upgrade_fee' => 0,
        ]);
    }
}
