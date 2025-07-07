<?php

namespace Database\Seeders;
 
use App\Models\Category;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test user',
            'username' => 'testuser',
            'email' => 'test@example.com'
        ]);
       $categories = [
    'lifestyle',
    'travel',
    'fitness',
    'fashion',
    'food',
    'technology',
    'memes',
    'photography',
    'motivational',
    'personal blog',
    'entertainment',
    'news & updates',
    'quotes',
    'DIY & crafts',
    'education',
];

            foreach ($categories as $category) {
                Category::create(['name' => $category]);
        
    }

    // Post::factory(100)->create();

  

    }
}
