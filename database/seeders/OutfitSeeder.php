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
            // Extreme Winter / Near Freezing (Below 5°C)
            [
                'name' => 'Thermal Innerwear, Heavy Coat & Woolen Cap',
                'min_temp' => -10.00, 'max_temp' => 5.00, 'type' => 'Casual',
                'advice' => 'Extreme cold alert! Use thermal layers and keep your head covered to prevent heat loss.',
            ],
            [
                'name' => 'Heavy Tweed Blazer with Woolen Muffler',
                'min_temp' => -5.00, 'max_temp' => 6.00, 'type' => 'Formal',
                'advice' => 'Formal yet freezing. Ensure your blazer is wool-blend and wear insulated boots.',
            ],

            // Deep Winter (5°C - 15°C)
            [
                'name' => 'Hoodie, Muffler, and Thick Socks',
                'min_temp' => 5.01, 'max_temp' => 15.00, 'type' => 'Casual',
                'advice' => 'It is cold out there! Don\'t forget your muffler and socks to stay cozy.',
            ],
            [
                'name' => 'Heavy Woolen Shawl over Panjabi',
                'min_temp' => 6.00, 'max_temp' => 18.00, 'type' => 'Formal',
                'advice' => 'A classic winter formal choice. The shawl provides excellent insulation against the wind.',
            ],

            // Autumn / Mild Winter (16°C - 25°C)
            [
                'name' => 'Full-Sleeve T-shirt & Denim',
                'min_temp' => 16.00, 'max_temp' => 22.00, 'type' => 'Casual',
                'advice' => 'Perfect transitional weather! Full sleeves will keep the mild morning chill away.',
            ],
            [
                'name' => 'Full-Sleeve Panjabi with a Light Koti (Vest)',
                'min_temp' => 18.00, 'max_temp' => 25.00, 'type' => 'Formal',
                'advice' => 'The evening breeze might be cool. A Koti adds style and a layer of comfort.',
            ],

            // Monsoon / Rainy (22°C - 31°C)
            [
                'name' => 'Dark Colored Salwar Kameez & Sandals',
                'min_temp' => 22.00, 'max_temp' => 31.00, 'type' => 'Casual',
                'advice' => 'Darker colors are best for rainy days as they don\'t show mud splashes easily.',
            ],
            [
                'name' => 'Synthetic Georgette Saree (Quick-Dry)',
                'min_temp' => 24.00, 'max_temp' => 30.00, 'type' => 'Formal',
                'advice' => 'High humidity today. Georgette fabric is lightweight and dries very quickly.',
            ],

            // Standard Summer (26°C - 35°C)
            [
                'name' => 'Half-Sleeve Cotton Shirt & Chinos',
                'min_temp' => 28.00, 'max_temp' => 34.00, 'type' => 'Casual',
                'advice' => 'Stay comfortable in the heat with breathable cotton and light colors.',
            ],
            [
                'name' => 'Cotton Saree with Breathable Blouse',
                'min_temp' => 26.00, 'max_temp' => 35.00, 'type' => 'Formal',
                'advice' => 'Handloom cotton is ideal for formal meetings during a typical humid summer day.',
            ],

            // Extreme Summer Heatwave (Above 34°C)
            [
                'name' => 'Linen Kurti with Light Leggings',
                'min_temp' => 32.00, 'max_temp' => 50.00, 'type' => 'Casual',
                'advice' => 'Heatwave warning! Linen allows maximum airflow to help your body stay cool.',
            ],
            [
                'name' => 'White Cotton & Thin Pajama',
                'min_temp' => 34.00, 'max_temp' => 55.00, 'type' => 'Formal',
                'advice' => 'Extreme sun. White reflects heat best. Drink plenty of water and stay in the shade.',
            ],
        ];

        foreach ($outfits as $outfit) {
            Outfit::create($outfit);
        }
    }
}
