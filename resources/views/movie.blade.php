@extends('app')

@section('title','Movie details')

@section('content')

    @if ($movie ?? '')
        <h1>Movie ID: {{$movie['id']}}</h1>
    @endif

@endsection