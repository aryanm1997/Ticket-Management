@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-3">
        <div class="card card-box bg-primary text-white">
            <div class="card-body">
                <h6>Total Staff</h6>
                <h2>{{ $staffCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-box bg-success text-white">
            <div class="card-body">
                <h6>Total Tasks</h6>
                <h2>{{ $totalTasks }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-box bg-warning text-dark">
            <div class="card-body">
                <h6>Open Tasks</h6>
                <h2>{{ $openTasks }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-box bg-danger text-white">
            <div class="card-body">
                <h6>Completed Tasks</h6>
                <h2>{{ $closedTasks }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4 card-box">

    <div class="card-header">
        Welcome Admin
    </div>

    <div class="card-body">

        <h5>
            {{ auth()->user()->name }}
        </h5>

        <p>
            Manage Staff and Tasks from the sidebar.
        </p>

    </div>

</div>

@endsection