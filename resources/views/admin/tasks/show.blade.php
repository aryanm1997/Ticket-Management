@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">View Task</h2>

<div class="space-y-2 max-w-lg">
    <div><strong>Title:</strong> {{ $task->title }}</div>
    <div><strong>Description:</strong> {{ $task->description }}</div>
    <div><strong>Status:</strong> {{ $task->status }}</div>
    <div><strong>Assigned Staff:</strong> {{ $task->staff?->name ?? 'Unassigned' }}</div>
    <div><a href="{{ route('admin.tasks.edit', $task->id) }}">Edit</a></div>
    <div>
        <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Delete task?');">
            @csrf
            @method('DELETE')
            <button class="text-red-600">Delete</button>
        </form>
    </div>
</div>

@endsection
