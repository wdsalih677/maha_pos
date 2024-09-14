<?php

namespace Database\Seeders;

use App\Models\suppliers\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            Supplier::create([
            'name' => 'mohamed Hassan',
            'phone' => '115257062',
            'email' => 'a@a.a',
            'address' => 'Hamara',
            'country' => 'KSA',
            'city' => 'Riyadh',
            ]);
    }
}
