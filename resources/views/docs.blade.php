@extends('app')

@section('title', 'Documentation')
    
@section('content')
    <div class="docs">
        <h1 class="docs-title">API Documentation</h1>
        <h3>Use our data in your projects</h3>

        <h2 class="docs-step">Schema</h2>
        <hr class="docs-separator">
        <p class="docs-text">
            The access to our API is over through HTTP. All data is sent and recieved as JSON.
            <img class="docs-image" src="images/API/api1.png" alt="API 1">
        </p>

        <h2 class="docs-step">Endpoints</h2>
        <hr class="docs-separator">
        <p class="docs-text">
            Here you will find all the app's endpoints information so you can use the data in a properly manner.
            <ul>
                <li>
                    Get all the movies in a paginate way
                    <img class="docs-image" src="images/API/get-all-movies.png" alt="API 2">
                </li>
            </ul>
            
        </p>
    </div>
@endsection