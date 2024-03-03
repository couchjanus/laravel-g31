<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     // BrandSeeder::class,
        //     // CategorySeeder::class
        // ]);
        // \App\Models\User::factory(10)->create();
        // \App\Models\Brand::factory(40)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        $user = \App\Models\User::find(13);
        $profile = new \App\Models\Profile([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'birthday' => "01-10-1999"
        ]);
        $profile->user()->associate($user);
        $profile->save();
    }
}
