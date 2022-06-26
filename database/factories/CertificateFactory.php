<?php

namespace Database\Factories;

use App\Enum\CertificatePrice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $random = rand(10, 50);

        return [
            'name' => $this->faker->name,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'code' => Str::random(),
            'plantation_year' => $this->faker->date,
            'number_of_trees' => $random,
            'total_price' => $random * CertificatePrice::PRICE_PER_TREE,
            'status' => rand(0,1)
        ];
    }
}
