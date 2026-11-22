<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Nour Saleh',
                'password' => Hash::make('nour2004'),
                'phone_number' => '0985512149',
                'address' => 'AL-tal',
                'type' => 'super_admin',
            ]
        );
    }
}
