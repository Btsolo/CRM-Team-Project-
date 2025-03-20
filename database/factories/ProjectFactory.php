<?php

namespace Database\Factories;

use App\Enum\ProjectPriority;
use App\Enum\ProjectStatus;
use App\Models\Client;
use App\Models\Customer;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
    public function definition(): array
    {
        $clients = Customer::pluck('id')->toArray();
        return [
            'name' => fake()->words(3,true),
            'description' => fake()->paragraph(3,true),
            'status' => fake()->randomElement(ProjectStatus::cases())->value,
            'priority' => fake()->randomElement(ProjectPriority::cases())->value,
            'start_date' => fake()->dateTimeBetween('-1 week','+1 week'),
            'end_date' => fake()->dateTimeBetween('+2 week', '+3 week'),
            'budget' => fake()->randomFloat(2,100,10000),
            'actual_cost' => function(array $attributes){
                if($attributes['status'] == 'completed' ){
                    return fake()->randomFloat(2, 100,10000);
                }else{
                    return null;
                }
            } ,
            'notes' => fake()->paragraph(3, true),
            'client_id' => Arr::random($clients)
        ];
    }
}