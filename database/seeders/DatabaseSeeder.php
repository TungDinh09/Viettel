<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            CitiesTableSeeder::class,
            DistrictsTableSeeder::class,
            AdminSeeder::class,
            // BlogSeeder::class,
            // ChannelSeeder::class,
            ServiceSeeder::class,
            CategorySeeder::class,
            // UserSeeder::class,
            ProductSeeder::class,
        ]);

        // Blog::factory()->count(10)->create();
        // Admin::factory()->count(10)->create();
        // // DB::table('cities')->insert($cities);
        // // DB::table('districts')->insert($districts);
        // User::factory()->count(10)->create();
    }
}
