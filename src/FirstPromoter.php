<?php

namespace Messerli90\FirstPromoter;

use GuzzleHttp\Client;

class FirstPromoter
{
    const BASE_URI = 'https://firstpromoter.com/api/v1/';

    /**
     * @var string $key
     */
    protected $key;

    /**
     * @var Client $client
     */
    protected $client;

    /**
     * FirstPromoter constructor.
     *
     * @param $key
     */
    public function __construct($key = null)
    {
        $this->key = $key;

        $this->client = new Client([
            'base_uri' => self::BASE_URI
        ]);
    }

    /**
     * Makes a public request
     *
     * @param string $method
     * @param string $uri
     * @param array $data
     *
     * @return object
     */
    protected function request($method, $uri, $data = [])
    {
        $res = $this->client->request($method, $uri, [
            'headers' => [
                "x-api-key" => $this->key
            ],
            'json' => $data
        ]);


        return json_decode($res->getBody()->getContents());
    }
}