<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'img' => 'img/' + $this->faker->word() + '.jpg', // In a real world use case I would get a list of the images uploaded (in the public directory), and choose one at random
            'date' => $this->faker->date(),
            'featured' => $this->faker->boolean(),
        ];
    }
}
