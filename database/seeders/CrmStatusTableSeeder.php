<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2022-06-11 06:58:58',
                'updated_at' => '2022-06-11 06:58:58',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2022-06-11 06:58:58',
                'updated_at' => '2022-06-11 06:58:58',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2022-06-11 06:58:58',
                'updated_at' => '2022-06-11 06:58:58',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
