@extends('app')

@section('title','Error 404')

@section('content')
    <nav class="nav">
        <div class="nav__actions">
            <a href="/" class="nav__link">Return Home</a>
        </div>
    </nav>
    <div class="error">
        <h2 class="error__code">Error code: 404</h2>
        <h3 class="error__message">The page or resource you requested for does not exist</h3>
    </div>
@endsection