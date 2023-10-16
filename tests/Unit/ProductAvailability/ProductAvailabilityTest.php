<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\ProductAvailability;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Notification;
use SnowIO\BrightpearlDataModel\ProductAvailability;
use SnowIO\BrightpearlDataModel\ProductAvailability\Total;

class ProductAvailabilityTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            "total" => [
                'inStock' => 111,
                'onHand' => 222,
                'allocated' => 333,
                'inTransit' => 444,
            ]
        ];
    }

    /**
     * @return void
     */
    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $productAvailability = ProductAvailability::fromJson($data);
        self::assertEquals($data, $productAvailability->toJson());
    }

    public function testWithers()
    {
        $total = Total::create()
            ->withInStock(111)
            ->withOnHand(222)
            ->withAllocated(333)
            ->withInTransit(444);

        $productAvailability = ProductAvailability::create()
            ->withTotal($total);

        self::assertEquals($this->getJsonData(), $productAvailability->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $productAvailability = ProductAvailability::fromJson($data);
        self::assertInstanceOf(Total::class, $productAvailability->getTotal());
        self::assertEquals(111, $productAvailability->getTotal()->getInStock());
        self::assertEquals(222, $productAvailability->getTotal()->getOnHand());
        self::assertEquals(333, $productAvailability->getTotal()->getAllocated());
        self::assertEquals(444, $productAvailability->getTotal()->getInTransit());
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $productAvailability1 = ProductAvailability::fromJson($data);
        $productAvailability2 = ProductAvailability::fromJson($data);
        self::assertTrue($productAvailability1->equals($productAvailability2));
    }
}
