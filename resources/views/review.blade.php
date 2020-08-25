@extends('app')

@section('title','Review')

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

    <div class="movie">
        @if ($review ?? '')
            <div class="movie__reviews">
                <div class="movie__review">
                    <h3 class="movie__review-title">{{ $review['title'] }}</h3>
                    <h4>By {{ $review['author'] }} - {{ $review['date'] }}</h4>
                    <p>{{ $review['text'] }}</p>
                </div>
            </div>
        @endif
    </div>

@endsection