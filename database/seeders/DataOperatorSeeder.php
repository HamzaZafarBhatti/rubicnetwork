<?php

namespace Database\Seeders;

use App\Models\DataOperator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataOperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data_operators = array(
            array('id' => '1', 'name' => 'MTN Network', 'status' => '1', 'created_at' => '2022-04-22 07:25:04', 'updated_at' => '2022-04-22 07:25:04'),
            array('id' => '2', 'name' => 'GLO Network', 'status' => '1', 'created_at' => '2022-05-26 21:18:17', 'updated_at' => '2022-05-26 21:18:17'),
            array('id' => '3', 'name' => 'Airtel Network', 'status' => '1', 'created_at' => '2022-05-26 21:18:29', 'updated_at' => '2022-05-26 21:18:29'),
            array('id' => '4', 'name' => '9Mobile Network', 'status' => '1', 'created_at' => '2022-05-26 21:18:49', 'updated_at' => '2022-05-26 21:18:49')
        );
        DataOperator::insert($data_operators);
    }
}
