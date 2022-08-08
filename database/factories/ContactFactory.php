<?php

namespace Database\Factories;

use App\Models\Counterparty;
use App\Models\Source;
use App\Models\SpecialGroup;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'post' => $this->faker->word(),
            'source_id' => $this->faker->randomElement(Source::select('id')->get()),
            'special_group_id' => $this->faker->randomElement(SpecialGroup::select('id')->get()),
            'user_id' => $this->faker->randomElement(User::select('id')->get()),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'telegram' => $this->faker->firstName(),
            'vk_url' => $this->faker->url(),
            'counterparty_id' => $this->faker->randomElement(Counterparty::select('id')->get()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
