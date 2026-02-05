<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', Product::count())
                ->description('Semua produk dalam database')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),

            Stat::make('Produk Aktif', Product::active()->count())
                ->description('Produk yang ditampilkan')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Best Seller', Product::bestseller()->count())
                ->description('Produk terlaris')
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),

            Stat::make('Total Kategori', Category::count())
                ->description('Kategori produk')
                ->descriptionIcon('heroicon-m-tag')
                ->color('info'),
        ];
    }
}
