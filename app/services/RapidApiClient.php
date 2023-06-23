<?php
/**
 * Created by PhpStorm.
 * User: tosin
 * Date: 3/8/17
 * Time: 10:24 AM
 */

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class RapidApiClient
{
    public function createResourceClient()
    {
        $client = new Client([
            'base_uri'  => url(env('RAPIDAPI_API_URL')),
            'headers'   => [
                'X-RapidAPI-Key'    => env('RAPIDAPI_API_KEY'),
                'X-RapidAPI-Host'   => 'yh-finance.p.rapidapi.com'
            ]
        ]);

        return $client;
    }

    public function getRapidApiData($symbol) {
        $response = $this->client()->get('get-historical-data', [
            'query' => [
                'symbol' => $symbol,
            ]
        ]);

        return json_decode($response->getBody());
    }

    protected function client()
    {
        return $this->createResourceClient();
    }
}