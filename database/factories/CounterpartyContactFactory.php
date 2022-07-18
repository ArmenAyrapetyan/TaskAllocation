<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Counterparty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CounterpartyContact>
 */
class CounterpartyContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contact_id' => $this->faker->randomElement(Contact::select('id')->get()),
            'counterparty_id' => $this->faker->randomElement(Counterparty::select('id')->get()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
