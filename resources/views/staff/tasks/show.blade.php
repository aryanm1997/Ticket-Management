@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">Task Details</h2>

<div class="card card-box p-3">
    <div><strong>Title:</strong> {{ $task->title }}</div>
    <div><strong>Description:</strong> {{ $task->description }}</div>
    <div><strong>Status:</strong> {{ $task->status }}</div>
    <div class="mt-3">
        <a href="{{ route('staff.dashboard') }}" class="btn btn-link">Back to tasks</a>
    </div>
</div>

@endsection
