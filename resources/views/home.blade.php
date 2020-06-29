@extends('app')

@section('title','Home')

@section('content')
    <nav class="nav">
        <div class="nav__actions">
            <a href="/catalog" class="nav__link">Catalog</a>
            <a href="/about" class="nav__link">About</a>
            <a href="/contact" class="nav__link">Contact</a>
            <a href="#" class="nav__link">Help</a>
        </div>

        <form action="/catalog/search" method="POST" class="nav__search">
            @csrf
            <input class="nav__input" name="movie" type="text" required/>
            <button type="submit" class="nav__link nav__link-icon">
                <svg class="nav__enter">
                    <use xlink:href="images/icons.svg#icon-arrow-thin-right"></use>
                </svg>
            </button>
        </form>
    </nav>

    <div class="home__layout">
        <div class="home__container">
            <h1 class="home__container-h1">
                Search interesting stuff about your favorite movies or series
            </h1>
            <p class="home__container-paragraph">
                Find information, date of releases or casts of your favorite movies, tv series. dig deep using my web site and perhaps you'll find this web site much comfortable and easy-to-use
            </p>

            <div class="carrusel">
                <img class="carrusel__img" src="images/carrusel/image4.jpg">
                <div class="carrusel__info">
                    <p id="phrase">Enjoy a different experience while looking for a movie or tv series</p>
                </div>
            </div>

            <p class="home__container-paragraph">
                Looking for a site to download movies and tv series or to watch online.
                click here <a target="_blank" class="link" href="https://thehackernews.com/2018/10/free-movie-download-websites.html">
                    Download or Watch
                </a>
            </p>
        </div>
    </div>
@endsection