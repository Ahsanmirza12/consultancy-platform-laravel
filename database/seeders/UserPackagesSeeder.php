<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserPackage;
use App\Models\Package;
use App\Models\User;

class UserPackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get a user (for example, the first user)
        $user = User::first(); // You can change this to a specific user

        // Add some sample user package data
        if ($user) {
            UserPackage::create([
                'user_id' => $user->id,
                'package_id' => 1, // Monthly Package
                'start_date' => now(),
                'end_date' => now()->addMonth(),
                'payment_screenshot' => 'path/to/payment_screenshot.jpg', // Replace with actual 
                'payment_status' => 'approved',
            ]);
            
        }
    }
}
