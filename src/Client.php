<?php

namespace PHPLegends\Api2Pdf;

/**
 * 
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class Client
{
    
    const API_BASE_URL = 'https://v2.api2pdf.com/';

    // const API_BASE_URL = 'https://httpbin.org/anything/';

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
            'verify' => false,
            'debug' => true,
            'headers' => [
                'Authorization' => $this->apiKey,
            ]
        ]);
    }


    /**
     * Send the request
     * @param string $path
     * @param array $payload
     * @param string $method
     * 
     * @return array
     */
    public function request(string $path, array $payload = [], $method = 'post') : array
    {
        $response = $this->getClient()->{$method}($path, [
            'json' => $this->buildPayload($payload)
        ]);

        return $this->prepareResponse($response);
    }

    /**
     * Delete a generated PDF by ResponseId
     * 
     * @param string $response_id the response id
     * 
     */
    public function delete(string $response_id): array
    {
        return $this->request("/file/{$response_id}", [], 'delete');
    }

    protected function prepareResponse($response): array
    {
        $array = json_decode((string) $response->getBody(), true);

        return array_change_key_case($array, CASE_UPPER);
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