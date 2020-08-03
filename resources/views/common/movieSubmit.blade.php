@section('movieSubmit')
    <span id="tooltip" role="tooltip" aria-describedby="tooltip">Click to Search</span>

    <form action="/catalog/search" method="POST" class="nav__search">
        @csrf
        <input class="nav__input" name="movie" type="text" required/>
        <button id="search_movie" type="submit" class="nav__link nav__link-icon">
            <svg class="nav__enter">
                <use xlink:href="images/icons.svg#icon-arrow-thin-right"></use>
            </svg>
        </button>
    </form>
@endsection