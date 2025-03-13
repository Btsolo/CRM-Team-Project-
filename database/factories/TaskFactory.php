<?php

namespace Database\Factories;

use App\Enum\TaskPriority;
use App\Enum\TaskStatus;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Arr;
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
    public function definition(): array
    {
        $customers = Customer::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();
        return [
            'title' => fake()->words(3, true),
            'description' => fake()->sentences(3, true),
            'customer_id' => Arr::random($customers),
            'user_id' => Arr::random($users),
            'status' => fake()->randomElement(TaskStatus::cases())->value,
            'priority' => fake()->randomElement(TaskPriority::cases())->value,
            'due_date' => fake()->dateTimeBetween('+1 week', '+2 weeks'),
            'completed_at' => function(array $attributes){
                if($attributes['status'] == 'completed'){
                    return fake()->dateTimeBetween('-2 weeks', '-1 week');
                }else{
                    return null;
                }
            },

        ];
    }
}
