@extends('layouts.app')

@section('content')
<div>
    <h1>{{ __('deduction.title') }}</h1>
</div>

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
        Description: <textarea name="description" id="description">{{ $deduction->description }}</textarea>
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" required> <br>
        <input type="submit" value="Edit Deduction">
    </form>
</div>
@endsection