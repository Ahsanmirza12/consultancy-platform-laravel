<?php 

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add sample packages to the packages table
        Package::create([
            'name' => 'Monthly Package',
            'price' => 500,
            'duration_days' => 30,  // Add the duration for the monthly package
        ]);
        
        Package::create([
            'name' => 'Yearly Package',
            'price' => 5000,
            'duration_days' => 365, // Add the duration for the yearly package
        ]);
        
        Package::create([
            'name' => 'Six-Month Package',
            'price' => 2500,
            'duration_days' => 180, // Add the duration for the six-month package
        ]);
    }
}
