<?php

use PHPLegends\Api2Pdf\V2\Api2Pdf;
use PHPUnit\Framework\TestCase;

class Api2PdfTest extends TestCase
{
    public function setUp(): void
    {

        $key = getenv('API2PDF_KEY');
        $this->pdf = Api2Pdf::create($key);
    }

    public function testChrome()
    {
        $chrome = $this->pdf->chrome();

        $this->assertTrue($chrome instanceof \PHPLegends\Api2Pdf\V2\Chrome);
    }

    public function testChromePdfFromUrl()
    {
        $result = $this->pdf->chrome()->createPdfFromUrl('http://example.com');

        $this->assertTrue($result instanceof \PHPLegends\Api2Pdf\V2\Result);
    }


}

