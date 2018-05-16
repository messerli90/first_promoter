<?php

namespace Messerli90\FirstPromoter;

use GuzzleHttp\Client;

class FirstPromoter
{
    /**
     *
     */
    const BASE_URI = 'https://firstpromoter.com/api/v1/';

    /**
     * @var string $key
     */
    protected static $key;

    /**
     * Makes a request to the FP API
     *
     * @param string $method
     * @param string $uri
     * @param array $data
     *
     * @return object
     */
    protected static function request($method, $uri, $data = [])
    {
        $client = new Client([
            'base_uri' => self::BASE_URI
        ]);

        $res = $client->request($method, $uri, [
            'headers' => [
                "x-api-key" => self::getApiKey()
            ],
            'json' => $data
        ]);


        return json_decode($res->getBody()->getContents());
    }

    /**
     * Set the First Promoter API Key
     *
     * @param $key
     * @return void
     */
    public static function setApiKey($key)
    {
        static::$key = $key;
    }

    /**
     * Get the First Promoter API Key
     *
     * @return string
     */
    public static function getApiKey()
    {
        if (static::$key) {
            return static::$key;
        }

        if ($key = getenv('FIRST_PROMOTER_KEY')) {
            return $key;
        }

        return config('services.first_promoter.key');
    }
}