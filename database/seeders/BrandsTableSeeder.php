<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name'=>'Artisan corparation', 'description'=>'Artisan Company description' ],
            ['name'=>'Cats corporation', 'description'=>'Cats Corporation'],
            ['name'=>'Dogs company', 'description'=>'Dog Company'],
        ];

        // \DB::delete('delete from brands');
        // \DB::table('brands')->truncate();
        foreach ($brands as $brand) {
            \DB::table('brands')->insert([
                'name' => $brand['name'],
                'description' => $brand['description'],
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
