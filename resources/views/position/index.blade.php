@extends('layouts.app')

@section('content')
<div>
    <a href="{{ route('positions.create') }}">
        <button>Create positions</button>
    </a>
</div>

<div>
    @forelse($positions as $position)
    <ul>
        <li>{{ $position->title }}</li>
    </ul>
    @empty
    <p>No positions</p>
    @endforelse
</div>
@endsection