<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Http;

/**
 * Sends request to the RapidAPI endpoints
 */
class RapidAPI {

    private $host = "imdb8.p.rapidapi.com";
    private $key;
    private $url = "https://imdb8.p.rapidapi.com/title";
    private $uri;
    private $params;

    function __construct($uri, $params){
        $this->uri = $uri;
        $this->params = $params;
        $this->key = env("API_KEY");
    }

    /**
     * Makes the request to the API endpoint
     * 
     * @param JSON the response
     */
    function execute(){
        $response = Http::withHeaders([
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->key
        ])
        ->get($this->url.'/'.$this->uri, $this->params);

        if($response->ok()){
            return $response->json();
        }
    }
}
