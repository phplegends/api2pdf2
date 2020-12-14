<?php

namespace PHPLegends\Api2PDF;

/**
 * 
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class Client
{
    const API_BASE_URL = 'https://v2018.api2pdf.com';

    protected $apiKey = null;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;

    }
}