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

class DatahubClient
{
    public function createResourceClient()
    {
        $client = new Client([
            'base_uri' => url(env('DATAHUB_API_URL')),
        ]);

        return $client;
    }

    public function getDatahubData() {
        try {
            $response = $this->client()->get('core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json');

            return json_decode($response->getBody());
        } catch (ClientException $e) {
            throw new \Exception($e->getMessage(), 400);
        } catch (ServerException $e) {
            throw new \Exception($e->getMessage(), 500);
        }
    }

    protected function client()
    {
        return $this->createResourceClient();
    }
}