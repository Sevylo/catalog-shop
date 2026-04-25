<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Software & Aplikasi',
                'description' => 'Lisensi software, aplikasi desktop dan mobile untuk produktivitas bisnis',
                'is_active'   => true,
                'sort_order'  => 1,
            ],
            [
                'name'        => 'Desain Grafis',
                'description' => 'Template desain, aset grafis, logo, banner, dan materi pemasaran digital',
                'is_active'   => true,
                'sort_order'  => 2,
            ],
            [
                'name'        => 'Pemasaran Digital',
                'description' => 'Jasa iklan, pengelolaan media sosial, SEO, dan strategi digital marketing',
                'is_active'   => true,
                'sort_order'  => 3,
            ],
            [
                'name'        => 'Konten & Media',
                'description' => 'Foto stock, video, musik, konten artikel, dan aset media digital',
                'is_active'   => true,
                'sort_order'  => 4,
            ],
            [
                'name'        => 'Pendidikan & Kursus',
                'description' => 'Modul pembelajaran, e-book, kursus online, dan materi pendidikan digital',
                'is_active'   => true,
                'sort_order'  => 5,
            ],
            [
                'name'        => 'Web & Domain',
                'description' => 'Hosting, domain, template website, dan layanan pengembangan web',
                'is_active'   => true,
                'sort_order'  => 6,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}
