@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">
    Task Management
</h2>
<div class="mb-4">
    <a href="{{ route('admin.tasks.create') }}" class="bg-green-600 text-white px-3 py-1">Add Task</a>
<div class="mb-4">
    <a href="{{ route('admin.tasks.create') }}" class="btn btn-success">Add Task</a>
</div>


<div class="card card-box">
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Assigned Staff</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->staff?->name ?? 'Unassigned' }}</td>
                    <td>
                        <a href="{{ route('admin.tasks.show', $task->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete task?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center p-4" colspan="4">No tasks found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $tasks->links() }}
</div>

@endsection