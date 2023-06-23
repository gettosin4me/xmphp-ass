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

class ApiClient
{
    
    public function __get($name)
    {
        switch ($name) {
            case 'datahub':
                return new \App\Services\DataHubClient();
            case 'rapidapi':
                return new \App\Services\RapidApiClient();
        }

        throw new \Exception('Invalid Client');
    }
}