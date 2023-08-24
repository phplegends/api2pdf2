<?php

namespace PHPLegends\Api2Pdf\V2;

/**
 * 
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class Client
{
    const API_BASE_URL = 'https://v2.api2pdf.com/';
    
    /**
     * @var string
     */
    protected $apiKey = null;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzleClient;


    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }


    public function getGuzzleClient() : \GuzzleHttp\Client
    {

        return $this->guzzleClient ?: $this->guzzleClient = new \GuzzleHttp\Client([
            'base_uri' => static::API_BASE_URL,
            'verify'   => false,
            'headers'  => [
                'Authorization' => $this->apiKey,
            ]
        ]);
    }

    public function request(string $path, array $payload = [], string $method = 'post') : Result
    {   
        if ('get' === strtolower($method)) {
            $body['query'] = $payload;
        } else {
            $body['json'] = $this->buildPayload($payload);
        }

        $response = $this->getGuzzleClient()->{$method}($path, $body);

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