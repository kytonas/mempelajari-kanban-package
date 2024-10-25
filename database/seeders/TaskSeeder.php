<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Task::insert([
        ['title' => 'Task 1', 'status' => 'Queue'],
        ['title' => 'Task 2', 'status' => 'In Progress'],
        ['title' => 'Task 3', 'status' => 'Completed'],
    ]);

    }
}
