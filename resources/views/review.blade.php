@extends('app')

@section('title','Review')

@section('content')
    <div class="review">
        @if ($review ?? '')
            <div class="review__review">
                <h5 class="review__title">{{$movieTitle}}</h5>
                <h3 class="review__review-title">{{ $review['title'] }}</h3>
                <h4>By {{ $review['author'] }} - {{ $review['date'] }}</h4>
                <p>{{ $review['text'] }}</p>
            </div>
        @endif
    </div>
@endsection