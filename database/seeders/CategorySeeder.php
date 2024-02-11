<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();

        DB::insert("INSERT INTO categories (name, slug, description) values(?, ?, ?)", ['Laravel', 'laravel', "PHP Fraimwork/"]);

        $categories = [
            ['name'=>'artisan', 'slug'=> 'artisan','description'=>'Artisan Categories' ],
            ['name'=>'php', 'slug'=> 'php', 'description'=>'PHP Categories', ],
            ['name'=>'fw laravel', 'slug'=> 'fw-laravel', 'description'=>'Laravel Categories'],
        ];

        // DB::delete('delete from categories');
        foreach ($categories as $category) {

            DB::insert('insert into categories
            (name, slug, description, created_at, updated_at) values (?, ?, ?, ?, ?)',
            [   $category['name'],
                $category['slug'],
                $category['description'],
                now(),
                now()
            ]);
        }
    }
}
