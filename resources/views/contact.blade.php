@extends('app')

@section('title', 'Contact')
    
@section('content')
<nav class="nav">
    <div class="nav__actions">
        <a href="/" class="nav__link">Home</a>
        <a href="/catalog" class="nav__link">Catalog</a>
        <a href="/about" class="nav__link">About</a>
        <a href="#" class="nav__link">Help</a>
    </div>
</nav>  

<div class="home__layout">
    <div class="home__container">
        <h1 class="home__container-h1">
            Contact me
        </h1>
        <p class="home__container-paragraph">
            I will place my social media so anyone can contact me
        </p>
    </div>
</div>
@endsection