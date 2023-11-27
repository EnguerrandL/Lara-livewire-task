<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


       $startDate =  fake()->dateTimeBetween('+1 week', '2 week');
       $limitDate =  fake()->dateTimeBetween($startDate, '+10 week');
        for ($val = 1; $val <= 10; $val++) {
            $taskName = 'Tâche N°' . $val;
        
           
            Task::create([
                'name' => $taskName,
                'date_start' => $startDate,
                'date_limit' => $limitDate,
                'description' => fake()->realText(100)

            ]);
        }
       User::factory(200)->create();
    //    Task::factory(50)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
