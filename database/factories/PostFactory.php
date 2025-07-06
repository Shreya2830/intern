<?php   

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();

        return [
            'image' => fake()->imageUrl(), // Generates a random image URL
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraph(5),
            'category_id' => Category::inRandomOrder()->first()->id, // Assuming you have a Category model and it has categories
            'user_id' => 1, // Assuming you have a user with ID 1
            'published_at' => fake()->optional()->dateTimeBetween('-1 year', 'now'), // Random date within the last year or null for drafts
        ];
    }
}