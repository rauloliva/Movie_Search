@extends('app')

@section('title', 'About')
    
@section('content')
    <nav class="nav">
        <div class="nav__actions">
            <a href="/" class="nav__link">Home</a>
            <a href="/catalog" class="nav__link">Catalog</a>
            <a href="/contact" class="nav__link">Contact</a>
            <a href="#" class="nav__link">Help</a>
        </div>
    </nav>  
    
    <div class="home__layout">
        <div class="home__container">
            <h1 class="home__container-h1">
                About this web site
            </h1>
            <p class="home__container-paragraph">
                This Web site was made with the purpose of give interesting information about movies and TV series
                In more technical words; this web site was made with Laravel framework
            </p>
        </div>
    </div>
@endsection