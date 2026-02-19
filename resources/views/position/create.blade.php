@extends('layouts.app')

@section('content')
<div>
    <a href="{{ route('positions.index') }}">
        <button>Back to positions</button>
    </a>
</div>

<div>
    <form action="{{ route('positions.store') }}" method="post">
        @csrf
        Title: <input type="text" name="title" required> <br>
        <input type="submit" value="Create Position">
    </form>
</div>
@endsection