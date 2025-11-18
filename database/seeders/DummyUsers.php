<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DummyUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin@test.com'),
        ])->assignRole('administrator');

        // Create Manager User
        User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@test.com',
            'password' => Hash::make('manager@test.com'),
        ])->assignRole('manager');

        // Create 5 IT Users
        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('it');
        });

        // Create 195 regular users
        // The manager user created above will also get the 'user' role.
        // If that's not desired, you can adjust the logic.
        User::factory(195)->create()->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
