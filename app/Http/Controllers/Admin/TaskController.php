<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('staff')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staffs = User::where('role', 'staff')->orderBy('name')->get();

        return view('admin.tasks.create', compact('staffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'status' => ['required','in:open,completed'],
            'assigned_to' => ['required','exists:users,id'],
        ]);

        Task::create($data);

        return redirect()->route('admin.tasks.index')->with('success','Task created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::with('staff')->findOrFail($id);

        return view('admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $staffs = User::where('role', 'staff')->orderBy('name')->get();

        return view('admin.tasks.edit', compact('task','staffs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'status' => ['required','in:open,completed'],
            'assigned_to' => ['required','exists:users,id'],
        ]);

        $task->update($data);

        return redirect()->route('admin.tasks.index')->with('success','Task updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success','Task deleted.');
    }
}
