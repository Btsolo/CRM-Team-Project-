<?php

namespace Database\Seeders;

use App\Models\Interaction;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(100)->create();
        Customer::factory(200)->create();
        Task::factory(300)->create();
        Interaction::factory(500)->create();
        Project::factory(20)->create();
    }
}
