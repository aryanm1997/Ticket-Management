@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">Edit Staff</h2>

<form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" class="max-w-lg">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name', $staff->name) }}" class="form-control" />
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input name="email" value="{{ old('email', $staff->email) }}" class="form-control" />
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Password (leave blank to keep current)</label>
        <input type="password" name="password" class="form-control" />
        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="active" {{ old('status', $staff->status)=='active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $staff->status)=='inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('status') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.staff.index') }}" class="btn btn-link ms-2">Cancel</a>
    </div>
</form>

@endsection
