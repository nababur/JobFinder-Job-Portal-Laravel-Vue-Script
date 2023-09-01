<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
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
            'company_id' => Company::all()->random()->id,
            'title' => $title = $this->faker->text(50),
            'slug' => Str::slug($title),
            'position' => $this->faker->jobTitle(),
            'address' => $this->faker->address(),
            'category_id' => rand(1,20),
            'type' => 'fulltime',
            'featured' => rand(0,1),
            'status' => rand(0,1),
            'description' => $this->faker->paragraph(rand(2, 10)),
            'roles' => $this->faker->paragraph(rand(2, 10)),
            'last_date' => $this->faker->dateTime(),
            'number_of_vacancy'=>rand(1, 10),
            'experience'=>rand(1, 10),
            'gender'=>$this->faker->randomElement(['male', 'female']),
            'salary'=>rand(10000, 80000),

            
        ];
    }
}
