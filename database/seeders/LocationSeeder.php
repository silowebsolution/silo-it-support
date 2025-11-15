<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => [
                    'en' => 'Tbilisi',
                    'ka' => 'თბილისი',
                ],
            ],
            [
                'name' => [
                    'en' => 'Batumi',
                    'ka' => 'ბათუმი',
                ],
            ],
        ])->each(fn ($location) => Location::query()->create($location));
    }
}
