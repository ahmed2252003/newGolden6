<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        
        return [
            'user_id'   => $this->faker->randomElement($users)->id ,
            'title' => $this->faker->name,
            'content' => $this->faker->name,
            'status' => random_int(0,1),
        ];
    }
}
