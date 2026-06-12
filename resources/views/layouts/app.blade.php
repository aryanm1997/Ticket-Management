<!DOCTYPE html>
<html>
<head>
    <title>Ticket Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .sidebar{
            min-height:100vh;
            background:#212529;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:12px;
        }

        .sidebar a:hover{
            background:#343a40;
        }

        .card-box{
            border:none;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
        }
    </style>
</head>
<body>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-2 sidebar">

            <h4 class="text-white text-center py-3">
                Ticket System
            </h4>

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>

                    <a href="{{ route('admin.staff.index') }}">Staff Management</a>

                    <a href="{{ route('admin.tasks.index') }}">Task Management</a>
                @elseif(auth()->user()->role === 'staff')
                    <a href="{{ route('staff.dashboard') }}">My Tasks</a>
                @endif
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth

        </div>

        <div class="col-md-10">

            <nav class="navbar navbar-light bg-white shadow-sm">

                <div class="container-fluid">

                    <h5 class="mb-0">
                        Admin Dashboard
                    </h5>

                    <div class="dropdown">

                        <button class="btn btn-outline-dark dropdown-toggle"
                                data-bs-toggle="dropdown">

                            {{ auth()->user()->name }}
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                           

                            <li>
                                <form action="{{ route('logout') }}"
                                      method="POST">

                                    @csrf

                                    <button class="dropdown-item text-danger">
                                        Logout
                                    </button>

                                </form>
                            </li>

                        </ul>

                    </div>

                </div>

            </nav>

            <div class="p-4">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>