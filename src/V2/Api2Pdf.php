<?php

namespace PHPLegends\Api2Pdf\V2;

/**
 * Factory class to call Api classes
 * 
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class Api2Pdf
{
    
    public static function create(string $apiKey) : self
    {
        return new static($apiKey);
    }

    public function __construct(string $apiKey) 
    {
        $this->client = new Client($apiKey);
    }

    public function chrome() : \PHPLegends\Api2Pdf\V2\Chrome
    {
        return new Chrome($this->getClient());
    }

    public function wkhtml() : \PHPLegends\Api2Pdf\V2\WkHtmlToPdf
    {
        return new WkHtmlToPdf($this->getClient());
    }

    public function getClient() : \PHPLegends\Api2Pdf\V2\Client
    {
        return $this->client;
    }

    public function deleteFile(string $response_id): array
    {
        return $this->getClient()->request("/file/{$response_id}", [], 'delete');
    }
}
   