@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">
    Staff Management
</h2>

<div class="mb-4">
    <a href="{{ route('admin.staff.create') }}" class="btn btn-success">Add Staff</a>
</div>

<div class="card card-box">
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($staffs as $staff)
                <tr>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->status }}</td>
                    <td>
                        <a href="{{ route('admin.staff.show', $staff->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('admin.staff.edit', $staff->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete staff?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center p-4" colspan="4">No staff records found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $staffs->links() }}
</div>

@endsection