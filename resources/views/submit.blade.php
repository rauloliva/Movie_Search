@extends('app')

@section('sub')
    <span id="tooltip" role="tooltip" aria-describedby="tooltip">Click to Search</span>
    <span id="txt_search_movie_tooltip" class="tooltip tooltip-red" role="tooltip" aria-describedby="tooltip">This is required</span>

    <form id="form" action="/catalog/search" method="POST" class="nav__search">
        @csrf
        <input id="txt_search_movie" class="nav__input" name="movie" type="text"/>
        <button id="btn_search_movie" type="submit" class="nav__link nav__link-icon">
            <svg class="nav__enter">
                <use xlink:href="images/icons.svg#icon-arrow-thin-right"></use>
            </svg>
        </button>
    </form>
@endsection