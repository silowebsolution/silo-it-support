<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DummyUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin@test.com'),
        ])->assignRole('administrator');

        // Create Manager User
        User::create([
            'name' => 'Manager',
            'email' => 'manager@test.com',
            'password' => Hash::make('manager@test.com'),
        ])->assignRole('manager');

        // Create 5 IT Users
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
            ])->assignRole('it');
        }

        // Create 195 regular users
        for ($i = 0; $i < 195; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
            ])->assignRole('user');
        }
    }
}
