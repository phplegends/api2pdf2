<?php

use PHPLegends\Api2Pdf\Chrome;
use PHPUnit\Framework\TestCase;

class ChromeTest extends TestCase
{
    public function setUp(): void
    {

        $key = getenv('API2PDF_KEY');
        $this->chrome = new Chrome($key);
    }

    public function testCreatePdfFromUrl()
    {
        $response = $this->chrome->createPdfFromUrl('http://example.com');

        $this->chrome->delete($response['ResponseId']);
    }

    public function testCreateImageFromUrl()
    {
        $response = $this->chrome->createImageFromUrl('http://example.com');

        var_dump($response);
    }
}

