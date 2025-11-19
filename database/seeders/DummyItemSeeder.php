<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemDetail;
use App\Models\ItemStatus;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DummyItemSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $locations = Location::all();
        $itemStatuses = ItemStatus::all();

        $itemNames = [
            'Laptop', 'Desktop PC', 'Monitor', 'Keyboard', 'Mouse', 'Docking Station',
            'Webcam', 'Headset', 'Printer', 'Scanner', 'Router', 'Switch', 'Server',
            'Projector', 'Conference Phone',
        ];

        $itemDetailsData = [
            'Laptop' => ['RAM: 16GB, SSD: 512GB, CPU: Intel i7', 'RAM: 8GB, SSD: 256GB, CPU: Intel i5'],
            'Desktop PC' => ['RAM: 32GB, SSD: 1TB, CPU: AMD Ryzen 7', 'RAM: 16GB, SSD: 512GB, CPU: Intel i7'],
            'Monitor' => ['Size: 27-inch, Resolution: 4K', 'Size: 24-inch, Resolution: 1080p'],
            'Server' => ['RAM: 128GB, Storage: 4TB RAID, CPU: Xeon Gold', 'RAM: 64GB, Storage: 2TB RAID, CPU: Xeon Silver'],
        ];

        foreach ($users as $user) {
            for ($i = 0; $i < rand(2, 3); $i++) {
                $itemName = Arr::random($itemNames);
                $item = Item::create([
                    'user_id' => $user->id,
                    'location_id' => $locations->random()->id,
                    'item_status_id' => $itemStatuses->random()->id,
                    'name' => $itemName,
                    'description' => 'Standard issue ' . $itemName,
                    'code' => 'IT-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT),
                    'image' => '',
                ]);

                if (isset($itemDetailsData[$itemName])) {
                    $detailDescription = Arr::random($itemDetailsData[$itemName]);
                    ItemDetail::create([
                        'item_id' => $item->id,
                        'name' => $itemName . ' Details',
                        'description' => $detailDescription,
                        'image' => '',
                        'image_name' => '',
                        'code' => 'IT-DETAIL-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT),
                    ]);
                }
            }
        }
    }
}
