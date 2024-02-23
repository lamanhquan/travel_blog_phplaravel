<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $user = User::factory()->create([
        //     'name' => 'John Doe'
        // ]);



        // Post::factory(10)->create([
        //     'user_id' => $user->id
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\User::factory(3)->create();
        // User::truncate();
        // Category::truncate();
        // Post::truncate();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
            'user_id' => $user_id->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-first-post',
            'excerpt' => 'Lorem ipsum dolar sit amet.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi viverra vehicula nisl eget blandit. Maris hendrerir accumsan',
        ]);

        Post::create([
            'user_id' => $user_id->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Lorem ipsum dolar sit amet.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi viverra vehicula nisl eget blandit. Maris hendrerir accumsan',
        ]);
        
    }
}

