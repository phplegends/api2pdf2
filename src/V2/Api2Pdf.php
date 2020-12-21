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

    public function chrome() : Chrome
    {
        return new Chrome($this->getClient());
    }

    public function wkhtml() : WkHtmlToPdf
    {
        return new WkHtmlToPdf($this->getClient());
    }

    public function getClient() : Client
    {
        return $this->client;
    }

    /**
     * Delete a file on command instead of waiting 24 hours for self-delete.
     * 
     * @param string $response_id Guid from responseId of initial API call
     */
    public function deleteFile(string $response_id): Result
    {
        return $this->getClient()->request("file/{$response_id}", [], 'delete');
    }

    /**
     * Call this to check the balance remaining on your account
     * 
     * @return \PHPLegends\Api2Pdf\V2\Result
     */
    public function getBalance() : Result
    {
        return $this->getClient()->request('balance', [], 'get');
    }

    /**
     * ZXING (Zebra Crossing) Bar Codes
     * 
     */
    public function getZebra(string $value, string $format = 'QR_CODE', array $options = []): array
    {
        $query  = compact('value', 'format') + $options;

        $response = $this->getClient()->getGuzzleClient()->get('zebra', compact('query'));

        return ['image/png', (string) $response->getBody()];
    }
}
   