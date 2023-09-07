<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['CityID' => 1, 'CityName' => 'Hà Nội', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 2, 'CityName' => 'Hồ Chí Minh', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 3, 'CityName' => 'Hải Phòng', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 4, 'CityName' => 'Cần Thơ', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 5, 'CityName' => 'Đà Nẵng', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 6, 'CityName' => 'Hà Giang', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 7, 'CityName' => 'Cao Bằng', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 8, 'CityName' => 'Lai Châu', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 9, 'CityName' => 'Lào Cai', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 10, 'CityName' => 'Tuyên Quang', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 11, 'CityName' => 'Lạng Sơn', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 12, 'CityName' => 'Bắc Kạn', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 13, 'CityName' => 'Thái Nguyên', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 14, 'CityName' => 'Yên Bái', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 15, 'CityName' => 'Sơn La', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 16, 'CityName' => 'Phú Thọ', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 17, 'CityName' => 'Vĩnh Phúc', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 18, 'CityName' => 'Quảng Ninh', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 19, 'CityName' => 'Bắc Giang', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 20, 'CityName' => 'Bắc Ninh', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 21, 'CityName' => 'Hải Dương', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 22, 'CityName' => 'Hưng Yên', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 23, 'CityName' => 'Thái Bình', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 24, 'CityName' => 'Hà Nam', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 25, 'CityName' => 'Nam Định', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 26, 'CityName' => 'Ninh Bình', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 27, 'CityName' => 'Thanh Hóa', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 28, 'CityName' => 'Nghệ An', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 29, 'CityName' => 'Hà Tĩnh', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 30, 'CityName' => 'Quảng Bình', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 31, 'CityName' => 'Quảng Trị', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 32, 'CityName' => 'Thừa Thiên-Huế', 'created_at' => now(), 'updated_at' => now()],
            
            //--------------33---------------------
            ['CityID' => 33, 'CityName' => 'Hòa Bình', 'created_at' => now(), 'updated_at' => now()],

            ['CityID' => 34, 'CityName' => 'Quảng Nam', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 35, 'CityName' => 'Quảng Ngãi', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 36, 'CityName' => 'Bình Định', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 37, 'CityName' => 'Phú Yên', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 38, 'CityName' => 'Khánh Hòa', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 39, 'CityName' => 'Ninh Thuận', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 40, 'CityName' => 'Bình Thuận', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 41, 'CityName' => 'Kon Tum', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 42, 'CityName' => 'Gia Lai', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 43, 'CityName' => 'Đắk Lắk', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 44, 'CityName' => 'Đắk Nông', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 45, 'CityName' => 'Lâm Đồng', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 46, 'CityName' => 'Bình Phước', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 47, 'CityName' => 'Tây Ninh', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 48, 'CityName' => 'Bình Dương', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 49, 'CityName' => 'Đồng Nai', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 50, 'CityName' => 'Long An', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 51, 'CityName' => 'Tiền Giang', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 52, 'CityName' => 'Bến Tre', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 53, 'CityName' => 'Trà Vinh', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 54, 'CityName' => 'Vĩnh Long', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 55, 'CityName' => 'Đồng Tháp', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 56, 'CityName' => 'An Giang', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 57, 'CityName' => 'Kiên Giang', 'created_at' => now(), 'updated_at' => now()],

            //------58--------------------------------------------,
            ['CityID' => 58, 'CityName' => 'Điện Biên', 'created_at' => now(), 'updated_at' => now()],

            ['CityID' => 59, 'CityName' => 'Hậu Giang', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 60, 'CityName' => 'Sóc Trăng', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 61, 'CityName' => 'Bạc Liêu', 'created_at' => now(), 'updated_at' => now()],
            ['CityID' => 62, 'CityName' => 'Cà Mau', 'created_at' => now(), 'updated_at' => now()],
            //--------63--------------
            ['CityID' => 63, 'CityName' => 'Bà Rịa-Vũng Tàu', 'created_at' => now(), 'updated_at' => now()],

        ];

        DB::table('cities')->insert($cities);
    }
}