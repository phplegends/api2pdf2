<?php

namespace PHPLegends\Api2Pdf\V2;

/**
 * 
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class Client
{
    
    const API_BASE_URL = 'https://httpbin.org/anything/';
    // const API_BASE_URL = 'https://v2.api2pdf.com/';
    
    /**
     * @var string
     */
    protected $apiKey = null;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;


    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }


    protected function getClient() : \GuzzleHttp\Client
    {
        return $this->client ?: $this->client = new \GuzzleHttp\Client([
            'base_uri' => static::API_BASE_URL,
            'verify'   => false,
            'headers'  => [
                'Authorization' => $this->apiKey,
            ]
        ]);
    }


    public function request(string $path, array $payload = [], string $method = 'post') : Result
    {
        $response = $this->getClient()->{$method}($path, [
            'json' => $this->buildPayload($payload)
        ]);

        return $this->prepareResponse($response);
    }

    protected function prepareResponse(\GuzzleHttp\Psr7\Response $response): Result
    {
        $array = json_decode((string) $response->getBody(), true);

        return new Result($array);
    }

    /**
     * Build the internal used payload
     * 
     * @param array $payload
     * @return array
     */
    protected function buildPayload(array $payload = [])
    {
        return $payload;
    }
}