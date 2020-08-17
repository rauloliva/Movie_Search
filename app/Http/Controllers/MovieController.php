<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\RapidAPI;
use App\Images;
use App\Movie;
use App\Movie_details;
use App\Reviews;

class MovieController extends Controller
{
    private $movie;
    /**
     * Number of images 
     */
    private $img_limit = 5;
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

        if($this->movieExists($id)){
            $this->retrieveMovie($id);
            $this->movie = $this->movie[0];
        }else{
            $ratings = $this->RequestAPI('get-ratings', $params);
            $reviews = $this->RequestAPI('get-user-reviews', $params);
            $synopses = $this->RequestAPI('get-synopses', $params);

            $params = ['tconst' => $id, 'limit' => $this->img_limit];
            $images = $this->RequestAPI('get-images', $params);
            $this->saveMovie($id,$details, $ratings, $reviews, $synopses, $images);
            $this->movie->movie_details; $this->movie->reviews; $this->movie->images;
        }
        return view('movie')->with('movie', $this->movie);
        // return response()->json($this->movie, 200);
    }

    /**
     * Validates if the movie exists, based on the given key
     * 
     * @param String $key the movie's key
     * @return Boolean returns false if the movie does not exist
     * otherwise returns true
     */
    private function movieExists($key) {
        $movie = Movie::where("key", $key)->get();
        return count($movie) == 0 ? false : true;
    }

    /**
     * Retrieves the movie based on the given key
     * 
     * @param String $key the movie's key
     * @return Array returns an array with length of 1
     */
    private function retrieveMovie($key) {
        $this->movie = Movie::where("key","=",$key)->with(['movie_details',
                        'reviews','images'])->get();
    }

    /**
     * Store the Movie, Movie_details and Reviews model
     * into sqlite database
     * 
     * @param String $key the movie's key works as an ID
     */
    private function saveMovie($key, $details, $rating, $reviews, $synopses, $images) {
        $movie = new Movie();
        $movie->key = $key;
        $movie->title = $details['title'];
        $movie->save();

        $movie_details = new Movie_details();
        $movie_details->release_year = $details['year'];
        $movie_details->synopses = mb_strimwidth($synopses[0]['text'], 0, 500, "...");
        $movie_details->rating = $rating['rating'];
        $movie_details->duration = $details['runningTimeInMinutes'];
        $movie->movie_details()->save($movie_details);

        foreach ($reviews['reviews'] as $i => $reviewObj ) {
            if($i < $this->reviews_limit) {
                $review = new Reviews();
                $review->title = $reviewObj['reviewTitle'];
                $review->author = $reviewObj['author']['displayName'];
                $review->date = $reviewObj['submissionDate'];
                $review->text = mb_strimwidth($reviewObj['reviewText'], 0, 300,"...");;
                $movie->reviews()->save($review);
            }
        }

        foreach($images['images'] as $img ) {
            $images = new Images();
            $images->image_url = $img['url'];
            $movie->images()->save($images);
        }
        $this->movie = $movie;
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
}
