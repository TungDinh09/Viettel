<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Product::factory()->count(30)->create();
        DB::table('products')->insert([
            'ProductID' => 1,
            'ProductName' => 'sun1',
            'Speed' => '12km/h',
            'Bandwidth' => '30',
            'Price' => 15000.0,
            'NTPrice' => 240000,
            'sort' => 1,
            'Gift' => 'Cáp quang',
            'Description' => '...',
            'IPstatic' => '30',
            'UseDay' => 5, // Điền giá trị thích hợp
            'CategoryID' => 1, // Điền ID của 'Doanh nghiệp gia đình' từ bảng 'categories'
            'ServiceID' => 1, // Điền ID của dịch vụ nếu có, nếu không để null
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductID' => 2,
            'ProductName' => 'sun2',
            'Speed' => '12km/h',
            'Bandwidth' => '30',
            'Price' => 15000.0,
            'NTPrice' => 240000,
            'sort' => 1,
            'Gift' => 'Cáp quang',
            'Description' => '...',
            'IPstatic' => '30',
            'UseDay' => 5, // Điền giá trị thích hợp
            'CategoryID' => 1, // Điền ID của 'Doanh nghiệp gia đình' từ bảng 'categories'
            'ServiceID' => 1, // Điền ID của dịch vụ nếu có, nếu không để null
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductID' => 3,
            'ProductName' => 'sun3',
            'Speed' => '12km/h',
            'NTPrice' => 240000,
            'sort' => 1,
            'Bandwidth' => '30',
            'Price' => 15000.0,
            'Gift' => 'Cáp quang',
            'Description' => '...',
            'IPstatic' => '30',
            'UseDay' => 5, // Điền giá trị thích hợp
            'CategoryID' => 1, // Điền ID của 'Doanh nghiệp gia đình' từ bảng 'categories'
            'ServiceID' => 1, // Điền ID của dịch vụ nếu có, nếu không để null
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('products')->insert([
            'ProductID' => 4,
            'ProductName' => 'star1',
            'Speed' => '12km/h',
            'Bandwidth' => '30',
            'Price' => 15000.0,
            'NTPrice' => 240000,
            'sort' => 1,
            'Gift' => 'Cáp quang',
            'Description' => '...',
            'IPstatic' => '30',
            'UseDay' => 5, // Điền giá trị thích hợp
            'CategoryID' => 2, // Điền ID của 'Doanh nghiệp gia đình' từ bảng 'categories'
            'ServiceID' => 1, // Điền ID của dịch vụ nếu có, nếu không để null
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
