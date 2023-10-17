<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\Order;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Order\Row;
use SnowIO\BrightpearlDataModel\OrderRow\OrderRow;
use SnowIO\BrightpearlDataModel\OrderRow\RowValue;

class OrderRowTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            'productId' => 123,
            'productName' => "test",
            'quantity' => [
                "magnitude" => "12"
            ],
            'rowValue' => [
                'taxCode' => "T20",
                'rowNet' => [
                    "value" => "12.21"
                ],
                'rowTax' => [
                    "value" => "2.44"
                ],
            ],
            'nominalCode' => 'test',
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $row = OrderRow::fromJson($data);
        self::assertEquals($data, $row->toJson());
    }

    public function testWithers()
    {
        $row = OrderRow::create()
            ->withProductId(123)
            ->withProductName('test')
            ->withQuantity(12)
            ->withRowValue(
                RowValue::create()
                ->withTaxCode('T20')
                ->withRowNet('12.21')
                ->withRowTax('2.44')
            )
            ->withNominalCode('test');

        self::assertEquals($this->getJsonData(), $row->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $row = OrderRow::fromJson($data);

        self::assertEquals(123, $row->getProductId());
        self::assertEquals("test", $row->getProductName());
        self::assertEquals(12, $row->getQuantity());
        self::assertEquals("test", $row->getNominalCode());

        self::assertEquals('T20', $row->getRowValue()->getTaxCode());
        self::assertEquals('12.21', $row->getRowValue()->getRowNet());
        self::assertEquals('2.44', $row->getRowValue()->getRowTax());
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $order1 = Row::fromJson($data);
        $order2 = Row::fromJson($data);
        self::assertTrue($order1->equals($order2));
    }
}
