<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Item;
use Spatie\Permission\Models\Role;

uses(RefreshDatabase::class);

beforeEach(function () {
    if (! Role::where('name', 'administrator')->exists()) {
        Role::create(['name' => 'administrator']);
    }
});

test('the login route can be accessed', function () {
    $this->get('/login')
         ->assertStatus(200)
         ->assertSeeLivewire('login');
});

test('the help route can be accessed', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
         ->get('/help')
         ->assertStatus(200)
         ->assertSeeLivewire('help');
});

test('api login with valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);
    $user->assignRole('administrator');

    $this->postJson('/api/login', [
        'email' => 'test@example.com',
        'password' => 'password',
    ])
         ->assertStatus(200)
         ->assertJsonStructure(['token']);
});

test('api login with invalid credentials', function () {
    $this->postJson('/api/login', [
        'email' => 'nonexistent@example.com',
        'password' => 'wrongpassword',
    ])
         ->assertStatus(422)
         ->assertJsonValidationErrors(['email'])
         ->assertJson([
             'message' => 'These credentials do not match our records.', // Updated message
             'errors' => [
                 'email' => [
                     'These credentials do not match our records.'
                 ]
             ]
         ]);
});

test('api logout route', function () {
    $user = User::factory()->create();
    $token = $user->createToken('test-token')->plainTextToken;

    $this->withHeaders([
        'Authorization' => 'Bearer ' . $token,
    ])->postJson('/api/logout')
         ->assertStatus(200)
         ->assertJson(['message' => 'Logout successful']);
});

test('api items with existing item', function () {
    Item::factory()->create(['code' => 'ITEM123']);

    $this->getJson('/api/items/ITEM123')
         ->assertStatus(200)
         ->assertJson([
             'code' => 'ITEM123',
         ]);
});

test('api items with non-existing item', function () {
    $this->getJson('/api/items/NONEXISTENT')
         ->assertStatus(404)
         ->assertJson(['message' => 'Item not found']);
});
