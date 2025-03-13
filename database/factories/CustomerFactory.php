<?php

namespace Database\Factories;

use App\Enum\CustomerIndustry;
use App\Enum\CustomerStatus;
use App\Enum\CustomerTag;
use App\Enum\CustomerType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'company_name' => fake()->company(),
            'customer_type' => fake()->randomElement(CustomerType::cases())->value,
            'industry' => fake()->randomElement(CustomerIndustry::cases())->value,
            'tags' => fake()->randomElement(CustomerTag::cases())->value,
            'status' => fake()->randomElement(CustomerStatus::cases())->value

        ];
    }
}
