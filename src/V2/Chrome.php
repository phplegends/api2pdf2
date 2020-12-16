<?php

namespace PHPLegends\Api2Pdf\V2;

/**
 * Represents the base endpoint /chrome/ for Api2PDF 2.0
 * 
 */
class Chrome
{

    /**
     * @var \PHPLegends\Api2Pdf\V2\Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Convert a URL or Web Page to PDF using Headless Chrome
     *  
     * @see https://app.swaggerhub.com/apis-docs/api2pdf/api2pdf/2.0.0-beta#/Headless%20Chrome/chromePdfFromUrlGET
     * @param string $url Url to the web page to convert to PDF
     * @param array $payload
     * 
     * @return \PHPLegends\Api2Pdf\V2\Result
     */
    public function createPdfFromUrl(string $url, array $payload = []) : Result
    {
        $payload['url'] = $url;

        return $this->client->request('chrome/pdf/url', $payload);
    }

    /**
     * Convert HTML to a PDF using Headless Chrome w/ Puppeteer
     * 
     * @see https://app.swaggerhub.com/apis-docs/api2pdf/api2pdf/2.0.0-beta#/Headless%20Chrome/chromePdfFromHtmlPost
     * 
     * @param string $html raw HTML to convert to PDF
     * @param array $payload
     * 
     * @return \PHPLegends\Api2Pdf\V2\Result
     */
    public function createPdfFromHtml(string $html, array $payload = []) : Result
    {
        $payload['html'] = $html;

        return $this->client->request('chrome/pdf/html', $payload);
    }

    /**
     * Convert a URL or Web Page to PDF using Headless Chrome.
     * 
     * @see https://app.swaggerhub.com/apis-docs/api2pdf/api2pdf/2.0.0-beta#/Headless%20Chrome/chromeImageFromUrlPost
     * 
     * @param string $url Url to the web page to convert to Image
     * 
     * @return \PHPLegends\Api2Pdf\V2\Result
     */
    public function createImageFromUrl(string $url, array $payload = []) : Result
    {
        $payload['url'] = $url;

        return $this->client->request('chrome/image/url', $payload);
    }

    public function createImageFromHtml($html, array $payload = []) : Result
    {
        $payload['html'] = $html;

        return $this->client->request('chrome/image/html', $payload);
    }
}