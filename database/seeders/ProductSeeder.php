<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $software   = Category::where('name', 'Software & Aplikasi')->first();
        $desain     = Category::where('name', 'Desain Grafis')->first();
        $marketing  = Category::where('name', 'Pemasaran Digital')->first();
        $konten     = Category::where('name', 'Konten & Media')->first();
        $pendidikan = Category::where('name', 'Pendidikan & Kursus')->first();
        $web        = Category::where('name', 'Web & Domain')->first();

        $products = [
            // Software
            [
                'category_id'     => $software?->id,
                'name'            => 'Microsoft Office 365 Personal (1 Tahun)',
                'description'     => 'Lisensi resmi Microsoft Office 365 Personal untuk 1 perangkat selama 1 tahun. Termasuk Word, Excel, PowerPoint, OneNote, dan 1TB OneDrive.',
                'long_description'=> '<p>Microsoft Office 365 Personal adalah solusi produktivitas terlengkap untuk individu dan pelajar. Dengan lisensi ini, Anda mendapatkan:</p><ul><li>Word, Excel, PowerPoint, OneNote</li><li>1TB penyimpanan OneDrive</li><li>Update otomatis seumur hidup berlangganan</li><li>Support Microsoft resmi</li></ul>',
                'price'           => 499000,
                'sale_price'      => 349000,
                'stock'           => 50,
                'unit'            => 'lisensi',
                'sku'             => 'SW-MS365-001',
                'is_active'       => true,
                'is_featured'     => true,
                'sort_order'      => 1,
            ],
            [
                'category_id'     => $software?->id,
                'name'            => 'Antivirus Premium (1 Tahun)',
                'description'     => 'Proteksi antivirus terpercaya untuk melindungi perangkat dari ancaman malware, ransomware, dan virus berbahaya.',
                'long_description'=> '<p>Lindungi perangkat Anda dengan proteksi berlapis. Fitur unggulan: Real-time protection, Web shield, Anti-phishing, Firewall premium.</p>',
                'price'           => 299000,
                'sale_price'      => null,
                'stock'           => 30,
                'unit'            => 'lisensi',
                'sku'             => 'SW-AV-001',
                'is_active'       => true,
                'is_featured'     => false,
                'sort_order'      => 2,
            ],
            // Desain
            [
                'category_id'     => $desain?->id,
                'name'            => 'Paket Template Presentasi Premium (100+ Slide)',
                'description'     => 'Koleksi 100+ template presentasi profesional untuk PowerPoint dan Google Slides. Cocok untuk bisnis, pendidikan, dan proposal.',
                'long_description'=> '<p>Tampilkan presentasi Anda dengan desain yang memukau. Paket ini mencakup 100+ slide dengan berbagai tema profesional, mudah diedit, dan kompatibel dengan PowerPoint & Google Slides.</p>',
                'price'           => 125000,
                'sale_price'      => 75000,
                'stock'           => 100,
                'unit'            => 'paket',
                'sku'             => 'DS-TPP-001',
                'is_active'       => true,
                'is_featured'     => true,
                'sort_order'      => 1,
            ],
            [
                'category_id'     => $desain?->id,
                'name'            => 'Desain Logo Profesional',
                'description'     => 'Layanan desain logo profesional dengan 3x revisi. File dikirim dalam format AI, EPS, PNG, dan SVG.',
                'long_description'=> '<p>Logo adalah wajah bisnis Anda. Tim desainer kami akan membuat logo yang unik, memorable, dan mencerminkan identitas brand Anda. Proses: konsultasi → draft → revisi → final.</p>',
                'price'           => 350000,
                'sale_price'      => null,
                'stock'           => 20,
                'unit'            => 'projek',
                'sku'             => 'DS-LOGO-001',
                'is_active'       => true,
                'is_featured'     => false,
                'sort_order'      => 2,
            ],
            // Marketing
            [
                'category_id'     => $marketing?->id,
                'name'            => 'Pengelolaan Instagram Bisnis (1 Bulan)',
                'description'     => 'Layanan pengelolaan akun Instagram bisnis selama 1 bulan. Termasuk 12 post, caption profesional, dan laporan performa.',
                'long_description'=> '<p>Tingkatkan kehadiran bisnis Anda di Instagram dengan konten yang konsisten dan berkualitas. Layanan meliputi: 12 konten per bulan, desain visual, copywriting, hashtag strategy, dan monthly report.</p>',
                'price'           => 750000,
                'sale_price'      => 599000,
                'stock'           => 10,
                'unit'            => 'bulan',
                'sku'             => 'MK-IG-001',
                'is_active'       => true,
                'is_featured'     => true,
                'sort_order'      => 1,
            ],
            [
                'category_id'     => $marketing?->id,
                'name'            => 'Jasa Iklan Google Ads (Setup + 1 Bulan)',
                'description'     => 'Setup kampanye Google Ads dan pengelolaan selama 1 bulan. Termasuk riset keyword, targeting, dan optimasi iklan.',
                'long_description'=> '<p>Raih lebih banyak pelanggan dengan Google Ads yang tepat sasaran. Layanan termasuk: keyword research, ad copywriting, targeting setup, monitoring harian, dan laporan performa bulanan.</p>',
                'price'           => 1500000,
                'sale_price'      => null,
                'stock'           => 5,
                'unit'            => 'projek',
                'sku'             => 'MK-GA-001',
                'is_active'       => true,
                'is_featured'     => false,
                'sort_order'      => 2,
            ],
            // Konten
            [
                'category_id'     => $konten?->id,
                'name'            => 'Paket Foto Stock (500 Foto Premium)',
                'description'     => 'Koleksi 500 foto stock premium beresolusi tinggi untuk kebutuhan konten bisnis, media sosial, dan presentasi.',
                'long_description'=> '<p>Foto berkualitas tinggi untuk segala kebutuhan konten digital. Semua foto bebas lisensi komersial, resolusi minimal 5MP, berbagai kategori: bisnis, teknologi, pendidikan, lifestyle.</p>',
                'price'           => 199000,
                'sale_price'      => 149000,
                'stock'           => 200,
                'unit'            => 'paket',
                'sku'             => 'KN-FOTO-001',
                'is_active'       => true,
                'is_featured'     => false,
                'sort_order'      => 1,
            ],
            // Pendidikan
            [
                'category_id'     => $pendidikan?->id,
                'name'            => 'E-Book Panduan Digital Marketing Lengkap',
                'description'     => 'E-book 200+ halaman berisi panduan lengkap digital marketing: SEO, SEM, Social Media, Content Marketing, dan Email Marketing.',
                'long_description'=> '<p>Kuasai digital marketing dengan panduan komprehensif ini. Cocok untuk pemula hingga menengah. Materi: strategi konten, SEO on-page & off-page, Google Ads, Facebook Ads, email marketing automation.</p>',
                'price'           => 89000,
                'sale_price'      => 59000,
                'stock'           => 500,
                'unit'            => 'buku',
                'sku'             => 'PD-EBOOK-001',
                'is_active'       => true,
                'is_featured'     => true,
                'sort_order'      => 1,
            ],
            [
                'category_id'     => $pendidikan?->id,
                'name'            => 'Kursus Online UI/UX Design (Akses Selamanya)',
                'description'     => 'Kursus UI/UX design dengan 40+ video tutorial, project nyata, dan sertifikat penyelesaian. Cocok untuk pemula.',
                'long_description'=> '<p>Pelajari UI/UX design dari dasar hingga mahir bersama instruktur berpengalaman. Materi: design thinking, wireframing, prototyping dengan Figma, user research, dan portfolio building.</p>',
                'price'           => 499000,
                'sale_price'      => 299000,
                'stock'           => 100,
                'unit'            => 'akses',
                'sku'             => 'PD-UIUX-001',
                'is_active'       => true,
                'is_featured'     => true,
                'sort_order'      => 2,
            ],
            // Web
            [
                'category_id'     => $web?->id,
                'name'            => 'Hosting Bisnis (1 Tahun) + Domain .com',
                'description'     => 'Paket hosting bisnis 5GB SSD + domain .com gratis 1 tahun. Termasuk SSL gratis, email bisnis, dan cPanel.',
                'long_description'=> '<p>Wujudkan kehadiran online bisnis Anda dengan hosting yang cepat dan reliable. Spesifikasi: 5GB SSD storage, unlimited bandwidth, 5 email bisnis, SSL gratis, uptime 99.9%.</p>',
                'price'           => 599000,
                'sale_price'      => 449000,
                'stock'           => 50,
                'unit'            => 'paket',
                'sku'             => 'WB-HOST-001',
                'is_active'       => true,
                'is_featured'     => false,
                'sort_order'      => 1,
            ],
            [
                'category_id'     => $web?->id,
                'name'            => 'Template Website Toko Online (WordPress)',
                'description'     => 'Template WordPress premium untuk toko online. Mobile responsive, WooCommerce ready, SEO optimized, 6 bulan support.',
                'long_description'=> '<p>Buat toko online profesional dengan template premium kami. Fitur: responsive design, WooCommerce integration, 1-click demo import, SEO ready, Page Builder compatible, 6 bulan support teknis.</p>',
                'price'           => 275000,
                'sale_price'      => null,
                'stock'           => 75,
                'unit'            => 'lisensi',
                'sku'             => 'WB-TEMP-001',
                'is_active'       => true,
                'is_featured'     => false,
                'sort_order'      => 2,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['sku' => $product['sku']],
                $product
            );
        }
    }
}
