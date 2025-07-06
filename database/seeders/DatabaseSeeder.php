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
            'hair spa',
            'makeups',
            'skin care',
            'botoxs',
            'plastic surgery',
            'facial',
            'nails',
            'massage',
            'eyebrows',
            'eyelashes treatement',
        ];
            foreach ($categories as $category) {
                Category::create(['name' => $category]);
        
    }

    // Post::factory(100)->create();

  

    }
}
