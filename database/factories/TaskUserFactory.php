<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TaskRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskUser>
 */
class TaskUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'task_id' => $this->faker->randomElement(Task::select('id')->get()),
            'user_id' => $this->faker->randomElement(User::select('id')->get()),
            'task_role_id' => $this->faker->randomElement(TaskRole::select('id')->get()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
