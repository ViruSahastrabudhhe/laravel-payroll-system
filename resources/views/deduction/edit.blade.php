@extends('layouts.app')

@section('content')
<div>
    <a href="{{ route('deductions.index') }}">
        <button>{{ __('deduction.back') }}</button>
    </a>
</div>

<div>
    <form action="{{ route('deductions.update', $deduction) }}" method="post">
        @csrf
        @method('PUT')
        Deduction: <input type="text" name="name" value="{{ $deduction->name }}" required> <br>
        Rate: <input type="number" name="rate" value="{{ $deduction->rate }}"> <br>
        Type: <select name="type" id="type" required>
            <option value="{{ $deduction->type }}" selected>{{ $deduction->type }}</option>
            <option value="">Select deduction type</option>
            <option value="" disabled>-----</option>
            @foreach($deductionType as $ddtype)
            <option value="{{ $ddtype->value }}">{{ $ddtype->value }}</option>
            @endforeach
        </select> <br>        
        Description: <textarea name="description" id="description">{{ $deduction->description }}</textarea>
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" required> <br>
        <input type="submit" value="Edit Deduction">
    </form>
</div>
@endsection