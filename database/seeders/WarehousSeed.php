<?php

namespace Database\Seeders;

use App\Models\warehouses\Warehous;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehousSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehous::create([
            'warehous_name' => 'المستودع الأول',
            'phone' => '115257062',
            'email' => 'a@a.a',
            'zip_code' => 2457,
            'country' => 'KSA',
            'city' => 'Riyadh',
            ]);
    }
}
