@extends('app')

@section('title','Home')

@section('content')
    <nav class="nav">
        <div class="nav__actions">
            <a href="/catalog" class="nav__link">Catalog</a>
            <a href="#" class="nav__link">About</a>
            <a href="#" class="nav__link">Contact</a>
            <a href="#" class="nav__link">Help</a>
        </div>

        <form action="/catalog/search" method="POST" class="nav__search">
            @csrf
            <input class="nav__input" name="movie" type="text" required/>
            <button type="submit" class="nav__link nav__link-icon">
                <svg class="login__link">
                    <use xlink:href="images/icons.svg#icon-arrow-thin-right"></use>
                </svg>
            </button>
        </form>
    </nav>
    @if ($errors->any())
        <div class="error">
            <ul class="error__list">
                @foreach ($errors->all() as $error)
                    <li><span class="error__prefix">Error:</span> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection