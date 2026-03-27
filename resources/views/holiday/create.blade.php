@extends('layouts.app')

@section('page_header')
    <h1>{{ __('holiday.title') }}</h1>
@endsection

@section('content')
<div>
    <a href="{{ route('holidays.index') }}">
        <button>{{ __('holiday.back') }}</button>
    </a>
</div>

<div>
    <form action="{{ route('holidays.store') }}" method="post">
        @csrf
        Holiday Name: <input type="text" name="name" required> <br>
        Start Date: <input type="date" name="start_date" required> <br>
        End Date: <input type="date" name="end_date" required> <br>
        Holiday Duration (days): <input type="number" name="holiday_duration" required> <br>
        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
        <input type="submit" value="Create Holiday">
    </form>
</div>
@endsection
