<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
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

        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin@test.com'),
        ]);
        $adminUser->assignRole('administrator');

        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@test.com',
            'password' => Hash::make('manager@test.com'),
        ]);
        $manager->assignRole('manager');

        User::factory(200)->create();

        $users = User::where('id', '>', 1)->get();

        foreach ($users as $user){
            if(in_array($user->id,[3,4,5,6,7])){
                $user->assignRole('it');
            }else{
                $user->assignRole('user');
            }
        }
    }
}
