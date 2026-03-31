<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $homePage = Page::getBySlug('home');

        $featuredProducts = Product::with('category')
            ->active()
            ->featured()
            ->take(8)
            ->get();

        $bestsellerProducts = Product::with('category')
            ->active()
            ->bestseller()
            ->take(8)
            ->get();

        $categories = Category::active()
            ->ordered()
            ->withCount('activeProducts')
            ->take(6)
            ->get();

        $latestProducts = Product::with('category')
            ->active()
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact(
            'homePage',
            'featuredProducts',
            'bestsellerProducts',
            'categories',
            'latestProducts'
        ));
    }
}
