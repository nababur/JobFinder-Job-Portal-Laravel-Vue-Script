<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'cname' => $name = $this->faker->company(),
            'slug' => Str::slug($name),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'website' => $this->faker->domainName(),
            'logo' => 'gridtemplate.png',
            'banner'=> 'banner.png',
            'slogan'=> 'Learn-earn-grow',
            'website' => 'https://nababur.info',
            'description' => $this->faker->paragraph(rand(2, 10))
            
        ];
    }
}
