<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('payments')->insert([
            'PaymentName' => 'Đóng cước 1 tháng ',
            'PaymentDescription' => 'Trả trước 1 tháng',
            'DayPayment'=> '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('payments')->insert([
            'PaymentName' => 'Đóng cước 2 tháng ',
            'PaymentDescription' => 'Trả trước 3 tháng',
            'DayPayment'=> '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('payments')->insert([
            'PaymentName' => 'Đóng cước 3 tháng ',
            'PaymentDescription' => 'Trả trước 6 tháng',
            'DayPayment'=> '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
