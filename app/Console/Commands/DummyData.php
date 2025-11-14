<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class DummyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dummy:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!app()->isProduction()) {
            $admin = User::create([
                'name' => 'admin@admin.com',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin@admin.com'),
            ]);
            $admin = User::create([
                'name' => 'manager@manager.com',
                'email' => 'manager@manager.com',
                'password' => Hash::make('admin@admin.com'),
            ]);
        }
    }
}
