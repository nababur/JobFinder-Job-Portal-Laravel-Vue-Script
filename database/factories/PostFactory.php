<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => $title = $this->faker->text(50),
            'slug' => Str::slug($title),
            'category_id' => rand(1,5),
            'description' => $this->faker->paragraph(rand(2, 10)),
            'post_thumbnail'=> 'uploads/posts.jpg',
            'status' => rand(0,1),
            

            
        ];
    }
}
