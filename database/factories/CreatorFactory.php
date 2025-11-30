<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Place;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Creator>
 */
class CreatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'   => fake()->sentence(6),
            'content' =>  fake()->paragraphs(5, true),
            'author'  =>  fake()->name(),
            'place_id'=>Place::inRandomOrder()->first()->id,
        ];
    }
}
