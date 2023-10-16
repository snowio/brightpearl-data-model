<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\SalesOrder;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\SalesOrder\Row;

class RowTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            'productId' => 123,
            'name' => "test",
            'quantity' => 1,
            'taxCode' => 'abc',
            'net' => 1,
            'tax' => 1,
            'nominalCode' => 'test',
            'externalRef' => 'test'
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $row = Row::fromJson($data);
        self::assertEquals($data, $row->toJson());
    }

    public function testWithers()
    {
        $row = Row::create()
            ->withProductId(123)
            ->withName('test')
            ->withQuantity(1)
            ->withTaxCode('abc')
            ->withNet(1)
            ->withTax(1)
            ->withNominalCode('test')
            ->withExternalRef('test');

        self::assertEquals($this->getJsonData(), $row->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $row = Row::fromJson($data);

        self::assertEquals(123, $row->getProductId());
        self::assertEquals("test", $row->getName());
        self::assertEquals(1, $row->getQuantity());
        self::assertEquals('abc', $row->getTaxCode());
        self::assertEquals(1, $row->getNet());
        self::assertEquals(1, $row->getTax());
        self::assertEquals("test", $row->getNominalCode());
        self::assertEquals("test", $row->getExternalRef());
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $order1 = Row::fromJson($data);
        $order2 = Row::fromJson($data);
        self::assertTrue($order1->equals($order2));
    }
}
