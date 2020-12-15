<?php

namespace PHPLegends\Api2Pdf;

class Chrome extends Client
{
    protected $client;

    public function createPdfFromUrl($url, array $payload = [])
    {
        $payload['url'] = $url;

        return $this->request('chrome/pdf/url', $payload);
    }

    public function createPdfFromHtml($html, array $payload = [])
    {
        $payload['html'] = $html;

        return $this->request('chrome/pdf/html', $payload);
    }

    public function createImageFromUrl($url, array $payload = [])
    {
        $payload['url'] = $url;

        return $this->request('chrome/image/url', $payload);
    }

    public function createImageFromHtml($html, array $payload = [])
    {
        $payload['html'] = $html;

        return $this->request('chrome/image/html', $payload);
    }

}