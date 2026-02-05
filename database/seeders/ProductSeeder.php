<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all()->keyBy('slug');

        $products = [
            // Boneka
            [
                'name' => 'Boneka Teddy Bear Premium',
                'slug' => 'boneka-teddy-bear-premium',
                'description' => '<p>Boneka teddy bear berkualitas tinggi dengan bahan yang lembut dan aman untuk anak. Ukuran besar 60cm, cocok untuk dipeluk.</p><ul><li>Bahan: Plush berkualitas tinggi</li><li>Ukuran: 60cm</li><li>Isi: Dakron premium anti kempes</li></ul>',
                'category_id' => $categories['boneka']->id ?? 1,
                'price' => 189000,
                'original_price' => 250000,
                'stock' => 25,
                'is_bestseller' => true,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '0+ tahun',
                'brand' => 'TeddyLand',
            ],
            [
                'name' => 'Boneka Unicorn Magical',
                'slug' => 'boneka-unicorn-magical',
                'description' => '<p>Boneka unicorn dengan desain magical yang cantik. Dilengkapi dengan lampu LED di tanduk yang bisa menyala.</p>',
                'category_id' => $categories['boneka']->id ?? 1,
                'price' => 145000,
                'stock' => 18,
                'is_bestseller' => true,
                'is_featured' => false,
                'is_active' => true,
                'age_range' => '3+ tahun',
                'brand' => 'MagicToys',
            ],
            [
                'name' => 'Boneka Kelinci Bunny Soft',
                'slug' => 'boneka-kelinci-bunny-soft',
                'description' => '<p>Boneka kelinci super lembut dengan telinga panjang yang menggemaskan. Tersedia dalam berbagai warna pastel.</p>',
                'category_id' => $categories['boneka']->id ?? 1,
                'price' => 99000,
                'stock' => 30,
                'is_bestseller' => false,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '0+ tahun',
                'brand' => 'BunnyWorld',
            ],

            // Puzzle
            [
                'name' => 'Puzzle Kayu Alphabet ABC',
                'slug' => 'puzzle-kayu-alphabet-abc',
                'description' => '<p>Puzzle kayu edukatif dengan huruf alphabet A-Z. Membantu anak mengenal huruf dengan cara menyenangkan.</p>',
                'category_id' => $categories['puzzle']->id ?? 2,
                'price' => 75000,
                'stock' => 40,
                'is_bestseller' => true,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '2-5 tahun',
                'brand' => 'WoodEdu',
            ],
            [
                'name' => 'Puzzle 3D Dinosaurus',
                'slug' => 'puzzle-3d-dinosaurus',
                'description' => '<p>Puzzle 3D berbentuk dinosaurus yang bisa dirakit sendiri. Melatih koordinasi tangan dan mata serta kesabaran anak.</p>',
                'category_id' => $categories['puzzle']->id ?? 2,
                'price' => 125000,
                'stock' => 15,
                'is_bestseller' => false,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '6+ tahun',
                'brand' => 'DinoWorld',
            ],
            [
                'name' => 'Puzzle Peta Indonesia',
                'slug' => 'puzzle-peta-indonesia',
                'description' => '<p>Puzzle kayu berbentuk peta Indonesia. Membantu anak mengenal provinsi dan pulau di Indonesia.</p>',
                'category_id' => $categories['puzzle']->id ?? 2,
                'price' => 95000,
                'stock' => 20,
                'is_bestseller' => false,
                'is_featured' => false,
                'is_active' => true,
                'age_range' => '4-8 tahun',
                'brand' => 'NusantaraEdu',
            ],

            // Lego
            [
                'name' => 'Building Blocks Creative 500pcs',
                'slug' => 'building-blocks-creative-500pcs',
                'description' => '<p>Set building blocks 500 pieces dengan berbagai warna dan bentuk. Tingkatkan kreativitas anak tanpa batas!</p>',
                'category_id' => $categories['lego']->id ?? 3,
                'price' => 285000,
                'original_price' => 350000,
                'stock' => 12,
                'is_bestseller' => true,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '4+ tahun',
                'brand' => 'BlockMaster',
            ],
            [
                'name' => 'Brick City Police Station',
                'slug' => 'brick-city-police-station',
                'description' => '<p>Set brick untuk membangun kantor polisi lengkap dengan minifigure polisi dan penjahat. 350 pieces.</p>',
                'category_id' => $categories['lego']->id ?? 3,
                'price' => 245000,
                'stock' => 8,
                'is_bestseller' => false,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '6+ tahun',
                'brand' => 'BrickCity',
            ],

            // Mainan Edukatif
            [
                'name' => 'Xylophone Kayu Warna-warni',
                'slug' => 'xylophone-kayu-warna-warni',
                'description' => '<p>Xylophone kayu dengan 8 nada yang jernih. Mengajarkan anak tentang musik sambil bermain.</p>',
                'category_id' => $categories['mainan-edukatif']->id ?? 4,
                'price' => 85000,
                'stock' => 22,
                'is_bestseller' => true,
                'is_featured' => false,
                'is_active' => true,
                'age_range' => '1-4 tahun',
                'brand' => 'MusicKids',
            ],
            [
                'name' => 'Busy Board Montessori',
                'slug' => 'busy-board-montessori',
                'description' => '<p>Busy board dengan berbagai aktivitas seperti kancing, resleting, tali sepatu. Melatih motorik halus anak.</p>',
                'category_id' => $categories['mainan-edukatif']->id ?? 4,
                'price' => 175000,
                'stock' => 15,
                'is_bestseller' => true,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '1-3 tahun',
                'brand' => 'MontessoriKids',
            ],
            [
                'name' => 'Magnetic Drawing Board',
                'slug' => 'magnetic-drawing-board',
                'description' => '<p>Papan gambar magnetik yang bisa dihapus dan digunakan berulang kali. Ramah lingkungan!</p>',
                'category_id' => $categories['mainan-edukatif']->id ?? 4,
                'price' => 65000,
                'stock' => 35,
                'is_bestseller' => false,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '2+ tahun',
                'brand' => 'DrawKids',
            ],

            // Action Figure
            [
                'name' => 'Superhero Collection Set',
                'slug' => 'superhero-collection-set',
                'description' => '<p>Set action figure superhero 6 karakter populer. Tinggi 15cm dengan sendi yang bisa digerakkan.</p>',
                'category_id' => $categories['action-figure']->id ?? 5,
                'price' => 320000,
                'original_price' => 400000,
                'stock' => 10,
                'is_bestseller' => true,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '6+ tahun',
                'brand' => 'HeroWorld',
            ],
            [
                'name' => 'Robot Transforming Car',
                'slug' => 'robot-transforming-car',
                'description' => '<p>Robot yang bisa berubah menjadi mobil sport. Dilengkapi dengan lampu dan suara.</p>',
                'category_id' => $categories['action-figure']->id ?? 5,
                'price' => 155000,
                'stock' => 20,
                'is_bestseller' => false,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '5+ tahun',
                'brand' => 'RoboTrans',
            ],

            // Kendaraan
            [
                'name' => 'Die Cast Car Collection',
                'slug' => 'die-cast-car-collection',
                'description' => '<p>Set mobil die cast 10 unit dengan berbagai model. Skala 1:64 dengan detail yang tajam.</p>',
                'category_id' => $categories['kendaraan']->id ?? 6,
                'price' => 195000,
                'stock' => 25,
                'is_bestseller' => true,
                'is_featured' => false,
                'is_active' => true,
                'age_range' => '3+ tahun',
                'brand' => 'SpeedCars',
            ],
            [
                'name' => 'Remote Control Racing Car',
                'slug' => 'remote-control-racing-car',
                'description' => '<p>Mobil remote control dengan kecepatan tinggi. Jarak kontrol hingga 30 meter.</p>',
                'category_id' => $categories['kendaraan']->id ?? 6,
                'price' => 275000,
                'stock' => 12,
                'is_bestseller' => true,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '6+ tahun',
                'brand' => 'RCMaster',
            ],
            [
                'name' => 'Kereta Api Set Lengkap',
                'slug' => 'kereta-api-set-lengkap',
                'description' => '<p>Set kereta api dengan rel melingkar, stasiun, dan aksesoris lengkap. Kereta bisa berjalan otomatis.</p>',
                'category_id' => $categories['kendaraan']->id ?? 6,
                'price' => 345000,
                'stock' => 8,
                'is_bestseller' => false,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '4+ tahun',
                'brand' => 'TrainWorld',
            ],

            // Board Games
            [
                'name' => 'Monopoly Junior Edition',
                'slug' => 'monopoly-junior-edition',
                'description' => '<p>Versi junior dari permainan Monopoly klasik. Cocok untuk anak-anak dengan aturan yang lebih sederhana.</p>',
                'category_id' => $categories['board-games']->id ?? 7,
                'price' => 165000,
                'stock' => 15,
                'is_bestseller' => true,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '5+ tahun',
                'brand' => 'GameMaster',
            ],
            [
                'name' => 'Ular Tangga Giant Mat',
                'slug' => 'ular-tangga-giant-mat',
                'description' => '<p>Permainan ular tangga ukuran besar dalam bentuk karpet. Anak bisa menjadi bidak permainan!</p>',
                'category_id' => $categories['board-games']->id ?? 7,
                'price' => 185000,
                'stock' => 10,
                'is_bestseller' => false,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '3+ tahun',
                'brand' => 'FunMat',
            ],

            // Outdoor Toys
            [
                'name' => 'Bubble Machine Automatic',
                'slug' => 'bubble-machine-automatic',
                'description' => '<p>Mesin gelembung otomatis yang bisa menghasilkan ratusan gelembung per menit. Sangat seru untuk pesta!</p>',
                'category_id' => $categories['outdoor-toys']->id ?? 8,
                'price' => 125000,
                'stock' => 20,
                'is_bestseller' => true,
                'is_featured' => false,
                'is_active' => true,
                'age_range' => '3+ tahun',
                'brand' => 'BubbleFun',
            ],
            [
                'name' => 'Flying Disc LED',
                'slug' => 'flying-disc-led',
                'description' => '<p>Frisbee dengan lampu LED yang bisa menyala dalam gelap. Cocok untuk bermain di malam hari.</p>',
                'category_id' => $categories['outdoor-toys']->id ?? 8,
                'price' => 55000,
                'stock' => 50,
                'is_bestseller' => false,
                'is_featured' => true,
                'is_active' => true,
                'age_range' => '5+ tahun',
                'brand' => 'OutdoorFun',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
