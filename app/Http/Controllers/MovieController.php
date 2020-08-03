<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\RapidAPI;
use App\Movie;
use App\Movie_details;
use App\Reviews;

class MovieController extends Controller
{
    private $movie;
    /**
     * Number of images 
     */
    private $img_limit = 6;
    /**
     * Number of reviews
     */
    private $reviews_limit = 5;

    public function show($id){
        $params = ['tconst' => $id];
        $details = $this->RequestAPI('get-details', $params);
        
        if(empty($details)){
            return view('errors/404');
        }
        $ratings = $this->RequestAPI('get-ratings', $params);
        $reviews = $this->RequestAPI('get-user-reviews', $params);
        $synopses = $this->RequestAPI('get-synopses', $params);

        $params = ['tconst' => $id, 'limit' => $this->img_limit];
        $images = $this->RequestAPI('get-images', $params);
        
        $this->movie = $this->constructMovie($details, $ratings, $reviews, $synopses, $images);
        $this->saveToDatabase($id, $this->movie);
        return view('movie')->with('movie', $this->movie);
        // return response()->json($this->movie, 200);
    }

    /**
     * Store the Movie, Movie_details and Reviews model
     * into sqlite database
     */
    private function saveToDatabase($key) {
        $data = $this->movie;
        $movie = new Movie();
        $movie->key = $key;
        $movie->title = $data['title'];
        $movie->save();

        $movie_details = new Movie_details();
        $movie_details->release_year = $data['year'];
        $movie_details->synopses = $data['synopses'];
        $movie_details->rating = $data['rating'];
        $movie_details->duration = $data['duration'];
        $movie_details->img_url = "imagen";
        $movie->movie_details()->save($movie_details);

        foreach ($data['reviews'] as $reviewObj ) {
            $review = new Reviews();
            $review->title = $reviewObj['review_title'];
            $review->author = $reviewObj['review_author'];
            $review->date = $reviewObj['review_date'];
            $review->text = $reviewObj['review_text'];
            $movie->reviews()->save($review);
        }
    }

    /**
     * Applies a request to IMDb API
     * and returns the response
     * 
     * @param String $uri the URI to send the request
     * @param Array $param the parameters send in the request
     * @return JSON
     */
    private function RequestAPI($uri, $param){
        $api = new RapidAPI($uri, $param);
        $response = $api->execute();
        return $response;
    }

    /**
     * Constructs the Movie requested in an array
     * 
     * @return Array
     */
    private function constructMovie($details, $rating, $reviews, $synopses, $images) {
        return [
            'title' => $details['title'],
            'year' => $details['year'],
            'duration' => $details['runningTimeInMinutes'],
            'rating' => $rating['rating'],
            'reviews' => $this->getReviews($reviews['reviews']),
            'synopses' => mb_strimwidth($synopses[0]['text'], 0, 500, "..."),
            'images' => $this->getImages($images['images'])
        ];
    }

    /**
     * Creates an array with required data in
     * reviews object
     * 
     * @return Array
     */
    private function getReviews($reviews) {
        $reviews = array_slice($reviews, 0, $this->reviews_limit);
        return array_map(function($review) {
            return [
                'review_title' => $review['reviewTitle'],
                'review_author' => $review['author']['displayName'],
                'review_date' => $review['submissionDate'],
                'review_text' => mb_strimwidth($review['reviewText'], 0, 255,"...")
            ];
        }, $reviews);
    }

    /**
     * Creates an array with required data in
     * images object
     * 
     * @return Array
     */
    private function getImages($images) {
        $imgs = array_map(fn($image) => ['image_url' => $image['url']], $images);
        return $imgs;
    }
}
