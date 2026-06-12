@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">Edit Task</h2>

<form action="{{ route('admin.tasks.update', $task->id) }}" method="POST" class="max-w-lg">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" value="{{ old('title', $task->title) }}" class="form-control" />
        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="open" {{ old('status', $task->status)=='open' ? 'selected' : '' }}>Open</option>
            <option value="completed" {{ old('status', $task->status)=='completed' ? 'selected' : '' }}>Completed</option>
        </select>
        @error('status') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Assign Staff</label>
        <select name="assigned_to" class="form-select">
            @foreach($staffs as $staff)
                <option value="{{ $staff->id }}" {{ old('assigned_to', $task->assigned_to) == $staff->id ? 'selected' : '' }}>{{ $staff->name }} ({{ $staff->email }})</option>
            @endforeach
        </select>
        @error('assigned_to') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.tasks.index') }}" class="btn btn-link ms-2">Cancel</a>
    </div>
</form>

@endsection
