@extends('app')

@section('title','Catalog')

@section('content')
    @if (isset($movies['results']))
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
                            <button type="submit" class="btn">More Details</button>
                            <img class="results__image" src="{{ $movie['image']['url'] }}" alt="Image" width="150" height="200">
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
     *  validates if the results are movies
     **/
    function validateIndexes($result){
        if(isset($result['title']) and isset($result['titleType'])){
            if($result['titleType'] == 'movie'){
                return true;
            }
        }
        return false;
    }
?>