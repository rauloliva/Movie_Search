@extends('app')

@section('title','Catalog')

@section('content')
    <nav class="nav">
        <div class="nav__actions">
            <a href="/" class="nav__link">Home</a>
            <a href="/about" class="nav__link">About</a>
            <a href="/contact" class="nav__link">Contact</a>
            <a href="#" class="nav__link">Help</a>
        </div>

        <span id="tooltip" role="tooltip" aria-describedby="tooltip">Click to Search</span>
        
        <form action="/catalog/search" method="POST" class="nav__search">
            @csrf
            <input class="nav__input" name="movie" type="text" required/>
            <button id="search_movie" type="submit" class="nav__link nav__link-icon">
                <svg class="nav__enter">
                    <use xlink:href="../images/icons.svg#icon-arrow-thin-right"></use>
                </svg>
            </button>
        </form>
    </nav>

    @if ($movies ?? '')
        <div class="results__layout">
            @foreach ($movies['results'] as $movie)
                @if (validateIndexes($movie))
                    {{-- Removing invalid characters --}}
                    <?php 
                        $id = str_replace('/','',
                              str_replace('title','',$movie['id']));
                    ?>

                    <form id="form-catalog" action="/movie/{{$id}}" method="GET">
                        <div class="results" id="container">
                            <p class="paragraph__title movie-title"
                                onclick="onClickImage()">
                                {{$movie['title']}}
                            </p>
                            <p class="paragraph__title">Type: {{$movie['titleType']}}</p>
                            <p>Year of release: {{$movie['year']}}</p>
                            <button type="submit" class="btn">More Details</button>
                            <img class="results__image" src="{{$movie['image']['url']}}" alt="Image" width="150" height="200">
                        </div>
                    </form>
                @endif
            @endforeach
        </div>
    @else
        <div class="home__layout">
            <div class="home__container">
                <h1 class="home__container-h1">
                    Catalog Section
                </h1>
                <p class="home__container-paragraph">
                    Here you'll find the retrieved results.
                    Click the button <i><strong>More Details</strong></i> to display the full information about a movie or a TV serie
                </p>
                <p class="home__container-paragraph">
                    <strong>There are no results</strong> start typing in the text field above
                </p>
            </div>
        </div>
    @endif
@endsection

<?php
    /**
     *  validates if the indexes are set
     **/
    function validateIndexes($result){
        if(isset($result['title']) and isset($result['titleType'])){
            if(($result['titleType'] == 'movie' or $result['titleType'] == 'tvMovie' or 
            $result['titleType'] == 'tvMovie') and isset($result['year'])){
                return true;
            }
        }
        return false;
    }
?>