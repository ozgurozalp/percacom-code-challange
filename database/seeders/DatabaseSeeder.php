<?php

namespace Database\Seeders;

use App\Models\Piece;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Varsayilan urunleri veritabinimiza ekliyor
     *
     * @return void
     */
    public function insertInitialProducts(): void
    {
        $products = [
            [
                'name' => 'Bilgisayar Kasasi',
                'description' => 'Hazir toplanmis kasa',
                'price' => '8000',
                'stock' => 25
            ],
            [
                'name' => '23 inch Monitor',
                'description' => 'Gamin Monitor',
                'price' => '1200',
                'stock' => 10
            ]
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }

    public function inserInitialPieces()
    {
        $pieces = [
            [
                'name' => 'Ekran Karti',
                'description' => 'Kasanin icinde gelmektedir.',
                'stock' => 25,
                'product_id' => 1
            ],
            [
                'name' => 'Islemci',
                'description' => 'Kasanin icinde gelmektedir.',
                'stock' => 25,
                'product_id' => 1
            ],
            [
                'name' => 'Guc Kaynagi',
                'description' => 'Kasanin icinde gelmektedir.',
                'stock' => 25,
                'product_id' => 1
            ],
            [
                'name' => 'HDMI Kablosu',
                'description' => 'Monitor ile birlikte gelmektedir.',
                'stock' => 10,
                'product_id' => 2
            ],
            [
                'name' => 'Guc Kablosu',
                'description' => 'Monitor ile birlikte gelmektedir.',
                'stock' => 10,
                'product_id' => 2
            ],
            [
                'name' => 'Monitor Ayakligi',
                'description' => 'Monitor ile birlikte gelmektedir.',
                'stock' => 10,
                'product_id' => 2
            ],
        ];
        foreach ($pieces as $piece) {
            Piece::create($piece);
        }
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->insertInitialProducts();
        $this->inserInitialPieces();
    }
}
