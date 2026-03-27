@extends('layouts.app')

@section('page_header')
    <h1>{{ __('deduction.title') }}</h1>
@endsection

@section('content')
<div>
    <a href="{{ route('deductions.index') }}">
        <button>{{ __('deduction.back') }}</button>
    </a>
</div>

<div>
    <form action="{{ route('deductions.store') }}" method="post">
        @csrf
        Deduction: <input type="text" name="name" required> <br>
        Rate: <input type="number" name="rate"> <br>
        Description: <textarea name="description" id="description"></textarea>
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" required> <br>
        <input type="submit" value="Create Deduction">
    </form>
</div>
@endsection