<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Boneka',
                'slug' => 'boneka',
                'icon' => '🧸',
                'description' => 'Koleksi boneka lucu dan menggemaskan untuk teman bermain si kecil',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Puzzle',
                'slug' => 'puzzle',
                'icon' => '🧩',
                'description' => 'Puzzle edukatif untuk melatih kemampuan berpikir dan problem solving anak',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Lego & Building Blocks',
                'slug' => 'lego',
                'icon' => '🏗️',
                'description' => 'Mainan susun yang melatih kreativitas dan imajinasi anak',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Mainan Edukatif',
                'slug' => 'mainan-edukatif',
                'icon' => '🎨',
                'description' => 'Mainan yang dirancang khusus untuk mendukung perkembangan anak',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Action Figure',
                'slug' => 'action-figure',
                'icon' => '🦸',
                'description' => 'Koleksi action figure superhero dan karakter favorit anak',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Kendaraan',
                'slug' => 'kendaraan',
                'icon' => '🚗',
                'description' => 'Mobil-mobilan, kereta, pesawat dan berbagai mainan kendaraan',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Board Games',
                'slug' => 'board-games',
                'icon' => '🎲',
                'description' => 'Permainan papan seru untuk dimainkan bersama keluarga',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Outdoor Toys',
                'slug' => 'outdoor-toys',
                'icon' => '⚽',
                'description' => 'Mainan untuk aktivitas luar ruangan yang menyehatkan',
                'is_active' => true,
                'sort_order' => 8,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
