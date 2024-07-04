<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bewoner>
 */
class BewonerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $wmo = $this->faker->boolean();

        return [
            'name' => $this->faker->name(),
            'wmo_vernieuw' => $wmo,
            'parceel_id' => TaxibedrijfParceelVerantwoordelijkFactory::new()->createOne()->parceel_id,
            'beschikking_id' => $wmo ? BeschikkingFactory::new()->createOne() : null,
        ];
    }
}
