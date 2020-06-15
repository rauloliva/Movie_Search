@extends('app')

@section('title','Catalog')

@section('content')
    <nav class="nav">
        <div class="nav__actions">
            <a href="/" class="nav__link">Home</a>
            <a href="#" class="nav__link">About</a>
            <a href="#" class="nav__link">Contact</a>
            <a href="#" class="nav__link">Help</a>
        </div>

        <form action="/catalog/search" method="POST" class="nav__search">
            @csrf
            <input class="nav__input" name="movie" type="text" required/>
            <button type="submit" class="nav__link nav__link-icon">
                <svg class="login__link">
                    <use xlink:href="../images/icons.svg#icon-arrow-thin-right"></use>
                </svg>
            </button>
        </form>
    </nav>

    @if ($result ?? '')
        <div class="results__layout">
            @foreach ($result['results'] as $movie)
                @if (test($movie))
                    <div class="results">
                        <p class="paragraph__title">Title: {{$movie['title']}}</p>
                        <p class="paragraph__title">Title Type: {{$movie['titleType']}}</p>
                        <p>Year of release: {{$movie['year']}}</p>
                        <img src="{{$movie['image']['url']}}" alt="Image" width="150" height="200">
                    </div>
                @endif
            @endforeach
        </div>
    @endif
@endsection

<?php
    function test($result){
        if(isset($result['title']) and isset($result['titleType'])){
            if(($result['titleType'] == 'movie' or $result['titleType'] == 'tvMovie' or 
            $result['titleType'] == 'tvMovie') and isset($result['year'])){
                return true;
            }
        }
        return false;
    }
?>