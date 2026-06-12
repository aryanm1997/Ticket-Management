<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $staffCount = User::where('role', 'staff')->count();

        $totalTasks = Task::count();

        $openTasks = Task::where('status', 'open')->count();

        $closedTasks = Task::where('status', 'completed')->count();

        return view('admin.dashboard', compact(
            'staffCount',
            'totalTasks',
            'openTasks',
            'closedTasks'
        ));
    }
}