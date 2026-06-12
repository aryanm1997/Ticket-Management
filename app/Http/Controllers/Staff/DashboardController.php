<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    /**
     * Show staff dashboard with assigned tasks.
     */
    public function index()
    {
        $user = auth()->user();

        $tasks = Task::where('assigned_to', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('staff.dashboard', compact('tasks'));
    }

    /**
     * Show a single assigned task.
     */
    public function show(Task $task)
    {
        $this->authorizeTask($task);

        return view('staff.tasks.show', compact('task'));
    }

    /**
     * Update task status (open/completed) by staff.
     */
    public function updateStatus(Request $request, Task $task)
    {
        $this->authorizeTask($task);

        $data = $request->validate([
            'status' => ['required','in:open,completed'],
        ]);

        $task->update($data);

        return redirect()->route('staff.dashboard')->with('success','Task status updated.');
    }

    protected function authorizeTask(Task $task)
    {
        if ($task->assigned_to !== auth()->id()) {
            abort(403);
        }
    }

}
