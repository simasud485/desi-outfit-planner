<?php

namespace Database\Seeders;

use App\Models\Outfit;
use Illuminate\Database\Seeder;

class OutfitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $outfits = [
            // Extreme summer Heatwave
            ['name' => 'White Cotton & Thin Pajama', 'min_temp' => 34.00, 'max_temp' => 50.00, 'type' => 'Formal'],
            ['name' => 'Linen Kurti with Light Leggings', 'min_temp' => 32.00, 'max_temp' => 48.00, 'type' => 'Casual'],

            // Standard Summer
            ['name' => 'Half-Sleeve Cotton Shirt & Chinos', 'min_temp' => 28.00, 'max_temp' => 34.00, 'type' => 'Casual'],
            ['name' => 'Cotton Saree with Breathable Blouse', 'min_temp' => 26.00, 'max_temp' => 35.00, 'type' => 'Formal'],

            // Monsoon/Rainy Logic (Implicit in Seeding)
            ['name' => 'Synthetic Georgette Saree (Quick-Dry)', 'min_temp' => 24.00, 'max_temp' => 30.00, 'type' => 'Formal'],
            ['name' => 'Dark Colored Salwar Kameez & Sandals', 'min_temp' => 22.00, 'max_temp' => 31.00, 'type' => 'Casual'],

            // Autumn / Mild Winter
            ['name' => 'Full-Sleeve Panjabi with a Light Koti (Vest)', 'min_temp' => 18.00, 'max_temp' => 25.00, 'type' => 'Formal'],
            ['name' => 'Full-Sleeve T-shirt & Denim', 'min_temp' => 16.00, 'max_temp' => 22.00, 'type' => 'Casual'],

            // Deep Winter
            ['name' => 'Heavy Woolen Shawl over Panjabi', 'min_temp' => 8.00, 'max_temp' => 18.00, 'type' => 'Formal'],
            ['name' => 'Hoodie, Muffler, and Thick Socks', 'min_temp' => 5.00, 'max_temp' => 15.00, 'type' => 'Casual'],
        ];

        foreach ($outfits as $outfit) {
            Outfit::create($outfit);
        }

    }
}
