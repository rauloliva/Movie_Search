<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Http;

/**
 * 
 */
class RapidAPI {

    private $host = "imdb8.p.rapidapi.com";
    private $key = "6d99670b47mshdf5ba963563c300p19a8b8jsn83ebe70f3a54";
    private $url = "https://imdb8.p.rapidapi.com/title";
    private $uri;
    private $params;

    function __construct($uri, $params){
        $this->uri = $uri;
        $this->params = $params;
    }

    /**
     * 
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
