<?php

namespace Database\Factories;

use App\Models\Counterparty;
use App\Models\ProjectGroup;
use App\Models\ProjectStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text(),
            'counterparty_id' => $this->faker->randomElement(Counterparty::select('id')->get()),
            'group_id' => $this->faker->randomElement(ProjectGroup::select('id')->get()),
            'status_id' => $this->faker->randomElement(ProjectStatus::select('id')->get()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
