<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $staffIds = User::where('role','staff')->pluck('id')->toArray();

        if (empty($staffIds)) {
            return;
        }

        $tasks = [
            ['title' => 'Fix login bug', 'description' => 'Users cannot login under certain conditions', 'status' => 'open'],
            ['title' => 'Update docs', 'description' => 'Refresh README and deployment docs', 'status' => 'open'],
            ['title' => 'Cleanup DB', 'description' => 'Remove old draft records', 'status' => 'completed'],
        ];

        foreach ($tasks as $i => $t) {
            Task::create([
                'title' => $t['title'],
                'description' => $t['description'],
                'status' => $t['status'],
                'assigned_to' => $staffIds[$i % count($staffIds)],
            ]);
        }
    }
}
