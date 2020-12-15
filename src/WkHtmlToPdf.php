<?php

namespace PHPLegends\Api2Pdf;

class WkHtmlToPdf extends Client
{
    protected $client;

    public function createPdfFromUrl($url, array $payload = [])
    {
        $payload['url'] = $url;

        return $this->request('wkhtml/pdf/url', $payload);
    }

    public function createPdfFromHtml($html, array $payload = [])
    {
        $payload['html'] = $html;

        return $this->request('wkhtml/pdf/html', $payload);
    }
}