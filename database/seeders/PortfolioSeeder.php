<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'Website E-Commerce Modern',
                'slug' => 'website-e-commerce-modern',
                'description' => 'Platform e-commerce yang dibangun dengan Laravel dan Vue.js. Fitur meliputi shopping cart, payment gateway integration, order tracking, dan admin dashboard yang lengkap.',
                'category' => 'E-Commerce',
                'technologies' => 'Laravel, Vue.js, MySQL, Stripe API',
                'link' => 'https://example-ecommerce.com',
                'image' => null,
            ],
            [
                'title' => 'Aplikasi Manajemen Project',
                'slug' => 'aplikasi-manajemen-project',
                'description' => 'Aplikasi web untuk mengelola project dan task tim. Dilengkapi dengan fitur collaboration, timeline tracking, dan automated reporting.',
                'category' => 'Web Development',
                'technologies' => 'Laravel, React, PostgreSQL, Redis',
                'link' => 'https://example-project-manager.com',
                'image' => null,
            ],
            [
                'title' => 'Mobile App Banking',
                'slug' => 'mobile-app-banking',
                'description' => 'Aplikasi mobile banking yang aman dengan fitur transfer, pembayaran, dan money management. Terintegrasi dengan backend Laravel API.',
                'category' => 'Mobile App',
                'technologies' => 'Flutter, Laravel API, Firebase',
                'link' => null,
                'image' => null,
            ],
            [
                'title' => 'Platform Learning Online',
                'slug' => 'platform-learning-online',
                'description' => 'Platform pembelajaran online dengan video streaming, quiz, dan certificate generation. Fitur lengkap untuk instruktur dan siswa.',
                'category' => 'Web Development',
                'technologies' => 'Laravel, Vue.js, MySQL, HLS Streaming',
                'link' => 'https://example-learning.com',
                'image' => null,
            ],
            [
                'title' => 'Desain UI/UX Dashboard',
                'slug' => 'desain-ui-ux-dashboard',
                'description' => 'Desain dashboard modern dan responsif untuk aplikasi analytics. Menggunakan prinsip design thinking dan user research yang mendalam.',
                'category' => 'UI/UX Design',
                'technologies' => 'Figma, Adobe XD, Prototyping',
                'link' => null,
                'image' => null,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
