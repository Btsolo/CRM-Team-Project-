<?php

namespace Database\Factories;

use App\Enum\InteractionType;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interaction>
 */
class InteractionFactory extends Factory
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
            'customer_id' => Arr::random($customers),
            'user_id' => Arr::random($users),
            'type' => fake()->randomElement(InteractionType::cases())->value,
            'subject' => fake()->words(3, true),
            'details' => fake()->sentences(3,true),
            'interaction_date' => fake()->dateTimeBetween('-1 week', '+1 week'),
            
        ];
    }
}
