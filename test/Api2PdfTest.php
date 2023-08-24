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

    public function testChromePdfFromHtml()
    {
        $result = $this->pdf->chrome()->createPdfFromHtml('<h1>Testando PDF</h1>');

        $this->assertTrue($result instanceof \PHPLegends\Api2Pdf\V2\Result);
    }


    public function testChromeImageFromUrl()
    {
        $result = $this->pdf->chrome()->createImageFromUrl('http://example.com');

        $this->assertTrue($result instanceof \PHPLegends\Api2Pdf\V2\Result);

        $this->assertTrue($result->has('FileUrl'));
    }


    public function testChromeImageFromHtml()
    {
        $result = $this->pdf->chrome()->createImageFromHtml('<h1>Testando PDF</h1>');

        $this->assertTrue($result instanceof \PHPLegends\Api2Pdf\V2\Result);

        $this->assertTrue($result->has('FileUrl'));
    }


    public function testWkhtmlPdfFromUrl()
    {
        $result = $this->pdf->wkhtml()->createPdfFromUrl('http://example.com');

        $this->assertTrue($result->has('FileUrl'));

        $this->assertTrue($result instanceof \PHPLegends\Api2Pdf\V2\Result);
    }


    public function testWkhtmlPdfFromHtml()
    {
        $result = $this->pdf->wkhtml()->createPdfFromHtml('<h1>Testando PDF</h1>');

        $this->assertTrue($result instanceof \PHPLegends\Api2Pdf\V2\Result);

        $this->assertTrue($result->has('FileUrl'));
    }

    public function testGetZebra()
    {
        [$content_type, $binary] = $this->pdf->getZebra('My name is Wallace', 'QR_CODE', [
            'height' => 80,
            'width'  => 120
        ]);

        $this->assertEquals($content_type, 'image/png');

        $this->assertTrue(is_string($binary));
    }

}

