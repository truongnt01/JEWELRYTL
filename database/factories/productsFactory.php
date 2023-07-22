<?php

namespace Database\Factories;

use Illuminate\Console\View\Components\Choice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name,
            'description' => $this->faker->address,
            'price' => $this->faker->numberBetween(100,1000),
            
        ];
    }
}
