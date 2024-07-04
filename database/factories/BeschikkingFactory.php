<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beschikking>
 */
class BeschikkingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = date_create(date("Y-m-d"));
        $end_date = date_create(date("Y-m-d"))->modify('+1 year');

        return [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'maximaal_kilometer' => $this->faker->numberBetween($min = 100, $max = 1000),
        ];
    }
}
