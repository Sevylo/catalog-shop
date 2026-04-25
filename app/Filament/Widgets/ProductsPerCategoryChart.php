<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class ProductsPerCategoryChart extends ChartWidget
{
    protected ?string $heading = 'Distribusi Produk per Kategori';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $categories = Category::withCount('products')->get();
        
        $labels = $categories->pluck('name')->toArray();
        $data = $categories->pluck('products_count')->toArray();

        $backgroundColors = [
            '#f97316', // orange-500
            '#0ea5e9', // sky-500
            '#10b981', // emerald-500
            '#8b5cf6', // violet-500
            '#f43f5e', // rose-500
            '#eab308', // yellow-500
            '#64748b', // slate-500
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Produk',
                    'data' => $data,
                    'backgroundColor' => array_slice($backgroundColors, 0, count($data)),
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
