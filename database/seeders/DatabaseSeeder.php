<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory(4)->create();

        User::create([
            'name' => 'Lalu M Fatwa',
            'username' => 'crace007',
            'email' => 'fatwa.tkj1@gmail.com',
            'password' => bcrypt('123akusayang')
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'General',
            'slug' => 'general'
        ]);

        Post::factory(20)->create();
    }
}
