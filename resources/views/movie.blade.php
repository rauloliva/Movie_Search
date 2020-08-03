@extends('app')

@section('title','Movie details')

@section('content')

    @if ($movie ?? '')
        <h1>Movie Title: {{$movie['title']}}</h1>
        <h1>Movie Year: {{$movie['year']}}</h1>
        <h1>Movie Duration: {{$movie['duration']}}</h1>
        <h1>Movie Rating: {{$movie['rating']}}</h1>
        <h1>Movie Review 1: {{$movie['reviews'][0]['review_title']}}</h1>
        <h1>Movie Synopses: {{$movie['synopses']}}</h1>
        <h1>Movie Image</h1>
        <img src="{{$movie['images'][0]['image_url']}}" width="150" height="150">
    @endif

@endsection