<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $banks = array(
            array('id' => '1', 'name' => 'Access Bank Plc', 'status' => '1', 'created_at' => '2022-03-16 08:07:45', 'updated_at' => '2022-03-16 12:07:45'),
            array('id' => '2', 'name' => 'Fidelity Bank Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '3', 'name' => 'First City Monument Bank Limited', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '4', 'name' => 'First Bank of Nigeria Limited', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '5', 'name' => 'Guaranty Trust Bank Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '6', 'name' => 'Union Bank of Nigeria Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '7', 'name' => 'United Bank for Africa Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '8', 'name' => 'Zenith Bank Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '9', 'name' => 'Citibank Nigeria Limited', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '10', 'name' => 'Ecobank Nigeria', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '11', 'name' => 'Heritage Bank Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '12', 'name' => 'Keystone Bank Limited', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '13', 'name' => 'Polaris Bank Limited', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '14', 'name' => 'Stanbic IBTC Bank Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '15', 'name' => 'Standard Chartered', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '16', 'name' => 'Sterling Bank Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '17', 'name' => 'Titan Trust Bank Limited', 'status' => '0', 'created_at' => '2022-03-24 16:58:44', 'updated_at' => '2022-03-24 20:58:44'),
            array('id' => '18', 'name' => 'Unity Bank Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '19', 'name' => 'Wema Bank Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '20', 'name' => 'Globus Bank Limited', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '21', 'name' => 'Parallex Bank Limited', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '22', 'name' => 'Providus Bank Limited', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '23', 'name' => 'SunTrust Bank Nigeria Limited', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '24', 'name' => 'Jaiz Bank Plc', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '25', 'name' => 'LOTUS BANK', 'status' => '0', 'created_at' => '2022-03-24 17:06:00', 'updated_at' => '2022-03-24 21:06:00'),
            array('id' => '26', 'name' => 'TAJBank Limited', 'status' => '0', 'created_at' => '2022-03-24 17:05:51', 'updated_at' => '2022-03-24 21:05:51'),
            array('id' => '27', 'name' => 'Peace Microfinance Bank', 'status' => '0', 'created_at' => '2022-03-24 17:00:56', 'updated_at' => '2022-03-24 21:00:56'),
            array('id' => '28', 'name' => 'Infinity Microfinance Bank', 'status' => '0', 'created_at' => '2022-03-24 17:00:34', 'updated_at' => '2022-03-24 21:00:34'),
            array('id' => '29', 'name' => 'Pearl Microfinance Bank Limited', 'status' => '0', 'created_at' => '2022-03-24 17:00:11', 'updated_at' => '2022-03-24 21:00:11'),
            array('id' => '30', 'name' => 'Sparkle Bank', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '31', 'name' => 'Covenant Mirofinance Bank Ltd', 'status' => '0', 'created_at' => '2022-03-24 16:59:27', 'updated_at' => '2022-03-24 20:59:27'),
            array('id' => '32', 'name' => 'Kuda Bank', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '33', 'name' => 'VFD MFB', 'status' => '1', 'created_at' => '2022-03-16 06:43:54', 'updated_at' => '2022-03-16 06:43:54'),
            array('id' => '34', 'name' => 'Mkobo MFB', 'status' => '0', 'created_at' => '2022-03-24 15:01:34', 'updated_at' => '2022-03-24 19:01:34'),
            array('id' => '35', 'name' => 'Coronation Merchant Bank', 'status' => '0', 'created_at' => '2022-03-24 15:01:20', 'updated_at' => '2022-03-24 19:01:20'),
            array('id' => '36', 'name' => 'FBNQuest Merchant Bank', 'status' => '0', 'created_at' => '2022-03-24 15:01:03', 'updated_at' => '2022-03-24 19:01:03'),
            array('id' => '37', 'name' => 'FSDH Merchant Bank', 'status' => '0', 'created_at' => '2022-03-24 15:00:49', 'updated_at' => '2022-03-24 19:00:49'),
            array('id' => '38', 'name' => 'Rand Merchant Bank', 'status' => '0', 'created_at' => '2022-03-24 15:00:34', 'updated_at' => '2022-03-24 19:00:34'),
            array('id' => '39', 'name' => 'Nova Merchant Bank', 'status' => '0', 'created_at' => '2022-03-24 15:00:21', 'updated_at' => '2022-03-24 19:00:21')
        );

        Bank::insert($banks);
    }
}
