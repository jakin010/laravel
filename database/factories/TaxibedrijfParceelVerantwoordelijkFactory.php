<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaxibedrijfParceelVerantwoordelijk>
 */
class TaxibedrijfParceelVerantwoordelijkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'taxibedrijf_id' => TaxiBedrijfFactory::new()->createOne(),
            'parceel_id' => ParceelFactory::new()->createOne(),
        ];
    }
}
