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
                <li><a href="{{ route('home') }}">{{ __('common.app_dashboard') }}</a></li>
                <li>{{ __('common.app_organization') }}
                    <ul>
                        <li><a href="{{ route('departments.index') }}">{{ __('department.sidebar') }}</a></li>
                        <li><a href="{{ route('positions.index') }}">{{ __('position.sidebar') }}</a></li>
                    </ul>
                </li>
                <li>{{ __('common.app_employee') }}
                    <ul>
                        <li><a href="{{ route('employees.index') }}">{{ __('employee.sidebar') }}</a></li>
                        <li><a href="{{ route('employees.create') }}">{{ __('employee.create') }}</a></li>
                    </ul>
                </li>
                <li>{{ __('common.app_attendance') }}
                    <ul>
                        <li><a href="{{ route('attendances.index') }}">{{ __('attendance.sidebar') }}</a></li>
                        <li><a href="{{ route('attendances.create') }}">{{ __('attendance.create') }}</a></li>
                        <li><a href="{{ route('leave_balances.index') }}">Employee Leave Balance</a></li>
                    </ul>
                </li>
                <li>{{ __('common.app_leave') }}
                    <ul>
                        <li><a href="{{ route('employee_leaves.index') }}">Leaves List</a></li>
                        <li><a href="{{ route('employee_leaves.create') }}">Create Leave Application</a></li>
                        <li><a href="{{ route('leave_types.index') }}">Leave Types</a></li>
                        <li><a href="{{ route('holidays.index') }}">Holidays</a></li>
                    </ul>
                </li>
                <li>{{ __('common.app_deduction') }}
                    <ul>
                        <li><a href="{{ route('deductions.index') }}">{{ __('deduction.sidebar') }}</a></li>
                        <li><a href="{{ route('deductions.create') }}">{{ __('deduction.create') }}</a></li>
                        <li><a href="{{ route('employee_deductions.index') }}">{{ __('employee.deduction') }}</a></li>
                    </ul>
                </li>
                <li>{{ __('common.app_payroll') }}
                    <ul>
                        <li><a href="{{ route('payroll.index') }}">Payroll List</a></li>
                        <li><a href="#">Generate Payslip</a></li>
                        <li><a href="#">Reports</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>

        <main>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            @yield('content')
        </main>
    </div>

</body>
</html>