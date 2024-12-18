<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        \App\Models\Category::factory(40)->create();
        \App\Models\Brand::factory(40)->create();
        // $this->call([
        //     // UsersTableSeeder::class,
        //     BrandsTableSeeder::class,
        //     // CategoriesTableSeeder::class,
        // ]);            

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
