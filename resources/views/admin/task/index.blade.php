@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">
    Task Management
</h2>

<table class="w-full bg-white shadow rounded">

    <tr class="bg-gray-200">
        <th class="p-3">Title</th>
        <th>Status</th>
        <th>Assigned Staff</th>
    </tr>

    @forelse($tasks as $task)
        <tr>
            <td class="p-3">{{ $task->title }}</td>
            <td>{{ $task->status }}</td>
            <td>{{ $task->staff?->name ?? 'Unassigned' }}</td>
        </tr>
    @empty
        <tr>
            <td class="p-3 text-center" colspan="3">
                No tasks found.
            </td>
        </tr>
    @endforelse

</table>

{{ $tasks->links() }}

@endsection