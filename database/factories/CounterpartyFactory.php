<?php

namespace Database\Factories;

use App\Models\Source;
use App\Models\SpecialGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Counterparty>
 */
class CounterpartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->companyEmail(),
            'website_url' => $this->faker->url(),
            'vk_url' => $this->faker->url(),
            'telegram' => $this->faker->userName(),
            'is_manufacturer' => $this->faker->boolean(),
            'special_group_id' => $this->faker->randomElement(SpecialGroup::select('id')->get()),
            'source_id' => $this->faker->randomElement(Source::select('id')->get()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
