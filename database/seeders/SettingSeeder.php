<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Group: general
            ['key' => 'store_name',        'value' => 'Toko Bisnis Digital Fasilkom UPNVJT', 'group' => 'general'],
            ['key' => 'store_tagline',     'value' => 'Produk Digital Berkualitas untuk Kebutuhan Bisnis Anda', 'group' => 'general'],
            ['key' => 'store_description', 'value' => 'Toko Bisnis Digital Fasilkom UPNVJT hadir untuk memenuhi kebutuhan produk digital dan bisnis bagi civitas akademika dan masyarakat umum. Kami menyediakan berbagai produk pilihan dengan harga terjangkau dan kualitas terjamin.', 'group' => 'general'],
            ['key' => 'store_logo',        'value' => null, 'group' => 'general'],

            // Group: contact
            ['key' => 'whatsapp_number',   'value' => '6281234567890', 'group' => 'contact'],
            ['key' => 'store_email',        'value' => 'bisdigital@upnvjt.ac.id', 'group' => 'contact'],
            ['key' => 'store_address',     'value' => 'Fakultas Ilmu Komputer, UPN "Veteran" Jawa Timur, Jl. Raya Rungkut Madya, Surabaya, Jawa Timur 60294', 'group' => 'contact'],
            ['key' => 'store_hours',       'value' => 'Senin - Jumat: 08.00 - 16.00 WIB', 'group' => 'contact'],
            ['key' => 'store_instagram',   'value' => 'https://instagram.com/tokobisdig', 'group' => 'contact'],
            ['key' => 'store_facebook',    'value' => null, 'group' => 'contact'],
            ['key' => 'maps_embed_url',    'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6!2d112.7!3d-7.33!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sUPN+Veteran+Jawa+Timur!5e0!3m2!1sid!2sid!4v1', 'group' => 'contact'],

            // Group: checkout
            ['key' => 'checkout_greeting',  'value' => 'Halo Kak, saya ingin order:', 'group' => 'checkout'],
            ['key' => 'checkout_closing',   'value' => 'Mohon konfirmasi ketersediaan dan info pembayarannya ya Kak, terima kasih!', 'group' => 'checkout'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
