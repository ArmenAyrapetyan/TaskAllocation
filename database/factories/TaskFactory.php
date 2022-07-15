<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\TaskStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
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
            'time_planned' => $this->faker->numberBetween(40,600),
            'time_spend' => null,
            'date_start' => now(),
            'date_end' => now()->addMonths(12),
            'project_id' => $this->faker->randomElement(Project::select('id')->get()),
            'status_id' => $this->faker->randomElement(TaskStatus::select('id')->get()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
