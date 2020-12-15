<?php

namespace PHPLegends\Api2Pdf\V2;

class WkHtmlToPdf
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function createPdfFromUrl($url, array $payload = [])
    {
        $payload['url'] = $url;

        return $this->client->request('wkhtml/pdf/url', $payload);
    }

    public function createPdfFromHtml($html, array $payload = [])
    {
        $payload['html'] = $html;

        return $this->client->request('wkhtml/pdf/html', $payload);
    }
}