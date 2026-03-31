<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Product;
use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TestAdminData extends Command
{
    protected $signature = 'test:admin-data';
    protected $description = 'Test admin data and features';

    public function handle()
    {
        $this->info('Testing Admin Data & Features...\n');
        
        // Test Database Connection
        try {
            DB::connection()->getPdo();
            $this->line('✓ Database connection successful');
        } catch (\Exception $e) {
            $this->error('✗ Database connection failed: ' . $e->getMessage());
            return 1;
        }
        
        // Test Record Counts
        $this->line("\n📊 Record Counts:");
        $this->line('  Categories: ' . Category::count() . ' records');
        $this->line('  Products: ' . Product::count() . ' records');
        $this->line('  Pages: ' . Page::count() . ' records');
        $this->line('  Users: ' . User::count() . ' records (Admin accounts)');
        
        // Test Category Data
        $this->line("\n🏷️  Categories:");
        $categories = Category::take(3)->get();
        foreach ($categories as $cat) {
            $this->line('  - ' . $cat->name . ' (Slug: ' . $cat->slug . ')');
        }
        
        // Test Product Data
        $this->line("\n📦 Products:");
        $products = Product::take(3)->get();
        foreach ($products as $prod) {
            $this->line('  - ' . $prod->name . ' | Price: Rp' . number_format($prod->price, 0, ',', '.'));
        }
        
        // Test Page Data
        $this->line("\n📄 Pages:");
        $pages = Page::all();
        foreach ($pages as $page) {
            $this->line('  - ' . $page->slug . ': ' . $page->title);
        }
        
        // Test Model Relationships
        $this->line("\n🔗 Model Relationships:");
        try {
            $firstProduct = Product::first();
            if ($firstProduct && $firstProduct->category) {
                $this->line('  ✓ Product->Category relationship works');
            }
        } catch (\Exception $e) {
            $this->error('  ✗ Product->Category relationship failed');
        }
        
        $this->info('\n✓ Testing completed successfully!');
        return 0;
    }
}
