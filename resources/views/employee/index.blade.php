@extends('layouts.app')

@section('page_header')
    <h1>{{ __('employee.title') }}</h1>
@endsection

@section('content')
<div>
    <a href="{{ route('employees.create') }}">
        <button>{{ __('employee.create') }}</button>
    </a>
    <a href="{{ route('employees.archive') }}">
        <button>{{ __('employee.archive') }}</button>
    </a>
</div>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Department</th>
                <th>Salary Grade</th>
                <th>Employment Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                <td>{{ $employee->position->title }}</td>
                <td>{{ $employee->department->name }}</td>
                <td>SG{{ $employee->position->salary_grade }}</td>
                <td>{{ $employee->employment_type }}</td>
                <td>{{ $employee->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('employees.show', $employee) }}">
                        <button>Show</button>
                    </a>
                    <a href="{{ route('employees.edit', $employee) }}">
                        <button>Edit</button>
                    </a>
                    <form action="{{ route('employees.destroy', $employee) }}" method='post'>
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Archive">
                    </form>
                </td>
            </tr>
        @empty
            <tr><p>No employees</p></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection