<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>  User::all()->random()->id,
            'title' => $this->faker->sentence,
            'image' => $this->faker->imageUrl,
            'rating' => rand(1, 5),
            'post' => $this->faker->paragraph
        ];
    }
}