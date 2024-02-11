<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name'=>'artisan','description'=>'Artisan Categories' ],
            ['name'=>'php', 'description'=>'PHP Categories', ],
            ['name'=>'fw laravel', 'description'=>'Laravel Categories'],
        ];

        // DB::delete('delete from categories');
        foreach ($brands as $brand) {

            \DB::insert('insert into brands
            (name,description, created_at, updated_at) values (?, ?, ?, ?)',
            [   $brand['name'],

                $brand['description'],
                now(),
                now()
            ]);
        }
    }
}
