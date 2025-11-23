<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ItemStatus;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->word,
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'item_status_id' => ItemStatus::factory(),
            'location_id' => Location::factory(),
        ];
    }
}
