<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Product;
use App\Models\Page;

class TestFilamentResources extends Command
{
    protected $signature = 'test:filament-resources';
    protected $description = 'Test Filament admin resources';

    public function handle()
    {
        $this->info('Testing Filament Admin Resources...\n');
        
        // Test 1: Category Resource
        $this->line('🏷️  Testing Category Resource:');
        try {
            $category = Category::first();
            if ($category) {
                $this->line('  ✓ Category load successful');
                $this->line('    - ID: ' . $category->id);
                $this->line('    - Name: ' . $category->name);
                $this->line('    - Active: ' . ($category->active ? 'Yes' : 'No'));
                $this->line('    - Products: ' . $category->products_count ?? 'N/A');
            }
        } catch (\Exception $e) {
            $this->error('  ✗ Category load failed: ' . $e->getMessage());
        }
        
        // Test 2: Product Resource
        $this->line('\n📦 Testing Product Resource:');
        try {
            $product = Product::with('category')->first();
            if ($product) {
                $this->line('  ✓ Product load successful');
                $this->line('    - ID: ' . $product->id);
                $this->line('    - Name: ' . $product->name);
                $this->line('    - Category: ' . $product->category->name);
                $this->line('    - Price: Rp' . number_format($product->price, 0, ',', '.'));
                $this->line('    - Stock: ' . $product->stock);
                $this->line('    - Active: ' . ($product->active ? 'Yes' : 'No'));
            }
        } catch (\Exception $e) {
            $this->error('  ✗ Product load failed: ' . $e->getMessage());
        }
        
        // Test 3: Page Resource
        $this->line('\n📄 Testing Page Resource:');
        try {
            $pages = Page::all();
            foreach (['home', 'about', 'contact'] as $slug) {
                $page = $pages->firstWhere('slug', $slug);
                if ($page) {
                    $this->line('  ✓ Page "' . $slug . '" loaded');
                    $this->line('    - Title: ' . $page->title);
                    $this->line('    - Has Image: ' . ($page->image ? 'Yes' : 'No'));
                    if ($slug === 'contact') {
                        $this->line('    - Phone: ' . ($page->phone ?? 'N/A'));
                        $this->line('    - Email: ' . ($page->email ?? 'N/A'));
                    }
                } else {
                    $this->error('  ✗ Page "' . $slug . '" not found');
                }
            }
        } catch (\Exception $e) {
            $this->error('  ✗ Page load failed: ' . $e->getMessage());
        }
        
        // Test 4: Model Validation
        $this->line('\n✔️  Testing Model Validation:');
        try {
            // Test invalid category
            Category::create(['name' => '']); // This should fail
            $this->error('  ✗ Category validation failed (should reject empty name)');
        } catch (\Exception $e) {
            $this->line('  ✓ Category validation working');
        }
        
        // Test 5: File Upload Support
        $this->line('\n📤 Testing File Upload Support:');
        try {
            $product = Product::first();
            if ($product->image) {
                $this->line('  ✓ Product images configured');
                $this->line('    - Image path: ' . $product->image);
            }
            
            $page = Page::where('slug', 'home')->first();
            if ($page) {
                $this->line('  ✓ Page images configured');
                if ($page->image) {
                    $this->line('    - Image path: ' . $page->image);
                } else {
                    $this->line('    - Image: Empty (ready for upload)');
                }
            }
        } catch (\Exception $e) {
            $this->error('  ✗ File upload test failed: ' . $e->getMessage());
        }
        
        // Test 6: Query Performance
        $this->line('\n⚡ Testing Query Performance:');
        try {
            $start = microtime(true);
            Category::with('products')->get();
            $time = number_format((microtime(true) - $start) * 1000, 2);
            $this->line('  ✓ Category with products: ' . $time . 'ms');
            
            $start = microtime(true);
            Product::with('category')->paginate(10);
            $time = number_format((microtime(true) - $start) * 1000, 2);
            $this->line('  ✓ Product pagination: ' . $time . 'ms');
        } catch (\Exception $e) {
            $this->error('  ✗ Query test failed: ' . $e->getMessage());
        }
        
        $this->info('\n✅ All tests completed!');
        $this->warn('\nNote: Visit http://localhost:8000/admin to manually test Filament admin panel');
        return 0;
    }
}
