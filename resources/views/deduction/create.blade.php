@extends('layouts.app')

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
        Type: <select name="type" id="type" required>
            <option value="">Select deduction type</option>
            @foreach($deductionType as $deduction)
            <option value="{{ $deduction->value }}">{{ $deduction->value }}</option>
            @endforeach
        </select> <br>
        Description: <textarea name="description" id="description"></textarea>
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" required> <br>
        <input type="submit" value="Create Deduction">
    </form>
</div>
@endsection