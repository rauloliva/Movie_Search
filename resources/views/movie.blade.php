@extends('app')

@section('title','Movie details')

@section('content')
    <nav class="nav">
        <div class="nav__actions">
            <a href="/" class="nav__link">Home</a>
            <a href="/about" class="nav__link">About</a>
            <a href="/contact" class="nav__link">Contact</a>
            <a href="#" class="nav__link">Help</a>
        </div>

        <span id="btn_search_movie_tooltip" class="tooltip" role="tooltip" aria-describedby="tooltip">Click to Search</span>
        <span id="txt_search_movie_tooltip" class="tooltip tooltip-red" role="tooltip" aria-describedby="tooltip">This is required</span>

        <form id="form" action="/catalog/search" method="POST" class="nav__search">
            @csrf
            <input id="txt_search_movie" class="nav__input" name="movie" type="text"/>
            <button id="btn_search_movie" type="submit" class="nav__link nav__link-icon">
                <svg class="nav__enter">
                    <use xlink:href="../images/icons.svg#icon-arrow-thin-right"></use>
                </svg>
            </button>
        </form>
    </nav>

    @if ($movie ?? '')
        <input type="hidden" name="id" value="{{ $movie['id'] }}">
        <input type="hidden" name="key" value="{{ $movie['key'] }}">
        <div class="movie">
            <div class="movie__header">
                <h1 class="movie__header-title">{{$movie['title']}}</h1>
                <h2 class="movie__header-text">Duration: {{$movie['movie_details']['duration']}}</h2>
                <h2 class="movie__header-text">Year: {{$movie['movie_details']['release_year']}}</h2>
                <h2 class="movie__header-text">Rating: {{$movie['movie_details']['rating']}}</h2>
            </div>
            
            <h3>Movie Synopses: {{$movie['movie_details']['synopses']}}</h3>

            <div class="movie__images">
                @foreach ($movie['images'] as $image)
                    <img src="{{ $image['image_url'] }}" width="200" height="200" alt="Image {{ $image['id'] }}">
                @endforeach
            </div>

            <h2>Movie Reviews:</h2>

            <div>
            @foreach ($movie['reviews'] as $review)
                <h3>{{ $review['title'] }}</h3>
                <h3>{{ $review['author'] }}</h3>
                <h3>{{ $review['date'] }}</h3>
                <h3>{{ $review['text'] }}</h3>
            @endforeach
            </div>
        </div>

    @endif

@endsection