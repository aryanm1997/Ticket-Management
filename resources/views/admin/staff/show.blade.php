@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">View Staff</h2>

<div class="space-y-2 max-w-lg">
    <div><strong>Name:</strong> {{ $staff->name }}</div>
    <div><strong>Email:</strong> {{ $staff->email }}</div>
    <div><strong>Status:</strong> {{ $staff->status }}</div>
    <div><strong>Role:</strong> {{ $staff->role }}</div>
    <div><a href="{{ route('admin.staff.edit', $staff->id) }}">Edit</a></div>
    <div>
        <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Delete staff?');">
            @csrf
            @method('DELETE')
            <button class="text-red-600">Delete</button>
        </form>
    </div>
</div>

@endsection
