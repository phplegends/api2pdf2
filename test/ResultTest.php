<?php

use PHPUnit\Framework\TestCase;
use PHPLegends\Api2Pdf\V2\Result;
use PHPLegends\Api2Pdf\V2\Api2Pdf;

class ResultTest extends TestCase
{

    public function setUp(): void
    {
        $this->array = [
            'ResponseId' => 'Testing-Response-Id',
            'File'       => 'http://teste.com/pdf/file-name.pdf'
        ];

        $this->result = new Result($this->array);
    }

    public function testGet()
    {

        $result = $this->result;

        $this->assertEquals($result->get('response_id'), 'Testing-Response-Id');
        $this->assertEquals($result->get('ResponseId'), 'Testing-Response-Id');

        $this->assertEquals($result->get('file'), 'http://teste.com/pdf/file-name.pdf');
        $this->assertEquals($result->get('File'), 'http://teste.com/pdf/file-name.pdf');

        $this->assertEquals($result->get('not_exists'), null);
        $this->assertEquals($result->get('NonExists'), null);
    }

    public function testHas()
    {
        $result = $this->result;

        $this->assertTrue($result->has('response_id'));
        $this->assertTrue($result->has('ResponseId'));

        $this->assertTrue($result->has('file'));
        $this->assertTrue($result->has('File'));

        $this->assertFalse($result->has('NonExists'));
        $this->assertFalse($result->has('non_exists'));
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(json_encode($this->result), json_encode($this->array));
    }

    public function testOffsetGet()
    {   
        $result = $this->result;
        
        $this->assertEquals($result['response_id'], 'Testing-Response-Id');
        $this->assertEquals($result['ResponseId'], 'Testing-Response-Id');

        $this->assertEquals($result['file'], 'http://teste.com/pdf/file-name.pdf');
        $this->assertEquals($result['File'], 'http://teste.com/pdf/file-name.pdf');

        $this->assertEquals($result['NotExists'], null);
        $this->assertEquals($result['not_exists'], null);
    }

    public function testOffsetExists()
    {
        $result = $this->result;

        $this->assertTrue(isset($result['response_id']));
        $this->assertTrue(isset($result['ResponseId']));

        $this->assertTrue(isset($result['file']));
        $this->assertTrue(isset($result['File']));

        $this->assertFalse(isset($result['NonExists']));
        $this->assertFalse(isset($result['non_exists']));
    }
}