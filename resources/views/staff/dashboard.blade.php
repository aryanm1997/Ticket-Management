@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">My Tasks</h2>

<div class="card card-box">
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <a href="{{ route('staff.tasks.show', $task->id) }}" class="btn btn-sm btn-primary">View</a>
                        <form action="{{ route('staff.tasks.update-status', $task->id) }}" method="POST" class="d-inline ms-2">
                            @csrf
                            @method('PUT')
                            @if($task->status === 'open')
                                <input type="hidden" name="status" value="completed">
                                <button class="btn btn-sm btn-success">Mark Completed</button>
                            @else
                                <input type="hidden" name="status" value="open">
                                <button class="btn btn-sm btn-secondary">Reopen</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center p-4" colspan="3">No tasks assigned to you.</td>
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
