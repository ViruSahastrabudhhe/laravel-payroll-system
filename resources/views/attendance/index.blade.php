@extends('layouts.app')

@section('content')
<div>
    <a href="{{ route('attendances.create') }}">
        <button>Add employee attendance</button>
    </a>

</div>

<div>
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Date</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Break In</th>
                <th>Break Out</th>
                <th>Overtime</th>
                <th>Undertime</th>
                <th>Late Time</th>
                <th>Total Time</th>
                <th>Total Break</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($attendances as $attendance)
            <tr>
                <td>{{ $attendance->employee->id }}</td>
                <td>{{ $attendance->employee->first_name }} {{ $attendance->employee->last_name }}</td>
                <td>{{ $attendance->date }}</td>
                <td>{{ $attendance->time_in }}</td>
                <td>{{ $attendance->time_out }}</td>
                <td>{{ $attendance->break_in }}</td>
                <td>{{ $attendance->break_out }}</td>
                <td>{{ $attendance->overtime }}</td>
                <td>{{ $attendance->undertime }}</td>
                <td>{{ $attendance->late }}</td>
                <td>{{ $attendance->total_time }}</td>
                <td>{{ $attendance->total_break }}</td>
                <td>
                    <form action="{{ route('attendances.destroy', $attendance) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @empty
            <p>No attendances</p>
            @endforelse
        </tbody>
    </table>
</div>
@endsection