<?php

namespace PHPLegends\Api2Pdf\V2;

class Chrome
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function createPdfFromUrl($url, array $payload = [])
    {
        $payload['url'] = $url;

        return $this->client->request('chrome/pdf/url', $payload);
    }

    public function createPdfFromHtml($html, array $payload = [])
    {
        $payload['html'] = $html;

        return $this->client->request('chrome/pdf/html', $payload);
    }

    public function createImageFromUrl($url, array $payload = [])
    {
        $payload['url'] = $url;

        return $this->client->request('chrome/image/url', $payload);
    }

    public function createImageFromHtml($html, array $payload = [])
    {
        $payload['html'] = $html;

        return $this->client->request('chrome/image/html', $payload);
    }
}