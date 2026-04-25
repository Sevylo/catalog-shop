<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseStatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseStatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalProducts = \App\Models\Product::count();
        $activeCategories = \App\Models\Category::active()->count();
        $lowStockProducts = \App\Models\Product::where('stock', '<=', 5)->count();

        return [
            Stat::make('Total Produk', $totalProducts)
                ->description('Semua produk dalam katalog')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),
                
            Stat::make('Kategori Aktif', $activeCategories)
                ->description('Kategori yang ditampilkan')
                ->descriptionIcon('heroicon-m-tag')
                ->color('info'),
                
            Stat::make('Stok Menipis', $lowStockProducts)
                ->description('Produk dengan stok <= 5')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color($lowStockProducts > 0 ? 'danger' : 'success'),
        ];
    }
}
