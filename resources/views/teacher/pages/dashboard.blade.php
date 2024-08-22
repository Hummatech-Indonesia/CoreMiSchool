@extends('teacher.layouts.app')

@section('content')

@if(!empty($notifications))
    @foreach($notifications as $notification)
        <div class="alert alert-warning">
            {{ $notification }}
        </div>
    @endforeach
@endif

<h3>Hallo ini dashboard guru</h3>
@endsection
