<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name='csrf-token' content='{{ csrf_token() }}'>

    <title>{{ config('app.name', 'Pagsanjan') }}</title>
</head>
<body>
    <div id='app'>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li><a href="{{ route('employees.index') }}">Employees</a></li>
                <li><a href="{{ route('positions.index') }}">Positions</a></li>
                <li><a href="#">Salary Structure</a></li>
                <li><a href="#">Attendance</a></li>
                <li><a href="#">Reports</a></li>
            </ul>
        </nav>

        <div>
            <p>Welcome, {{ auth()->user()->name }}!</p>
        </div>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>