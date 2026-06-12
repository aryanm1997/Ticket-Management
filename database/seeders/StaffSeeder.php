<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        $staffs = [
            ['name' => 'Staff One', 'email' => 'staff1@test.com'],
            ['name' => 'Staff Two', 'email' => 'staff2@test.com'],
            ['name' => 'Staff Three', 'email' => 'staff3@test.com'],
            ['name' => 'Staff Four', 'email' => 'staff4@test.com'],
            ['name' => 'Staff Five', 'email' => 'staff5@test.com'],
        ];

        foreach ($staffs as $s) {
            User::updateOrCreate(
                ['email' => $s['email']],
                [
                    'name' => $s['name'],
                    'password' => Hash::make('password123'),
                    'role' => 'staff',
                    'status' => 'active',
                ]
            );
        }
    }
}
