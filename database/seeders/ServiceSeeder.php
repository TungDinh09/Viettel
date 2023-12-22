<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Service::factory()->count(10)->create();
        DB::table('services')->insert([
            'ServiceName' => 'Sun ',
            'Price'=>'12000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('services')->insert([
            'ServiceName' => 'Star ',
            'Price'=>'12000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
     

    }
}
