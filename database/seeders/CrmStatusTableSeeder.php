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
                'created_at' => '2022-05-26 02:18:47',
                'updated_at' => '2022-05-26 02:18:47',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2022-05-26 02:18:47',
                'updated_at' => '2022-05-26 02:18:47',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2022-05-26 02:18:47',
                'updated_at' => '2022-05-26 02:18:47',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
