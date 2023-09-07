<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\GoodsOutNote;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\GoodsOutNote;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Event\Event;
use SnowIO\BrightpearlDataModel\GoodsOutNote\EventCollection;
use SnowIO\BrightpearlDataModel\GoodsOutNote\OrderRowCollection;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Row\Order;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Shipping;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Status;

class GoodsOutNoteTest extends TestCase
{
    /**
     * @return array<string, mixed>
     */
    private function getJsonData(): array
    {

        return [
            'orderId' => 111,
            'warehouseId' => 6657,
            'externalRef' => "external-ref",
            'transfer' => true,
            'priority' => true,
            'status' => [
                'packed' => true,
                'packedById' => 3,
                'packedOn' => "20/20/2000",
                'picked' => true,
                'printed' => true,
                'pickedById' => 13434,
                'printedById' => 23434,
                'shipped' => false,
                'shippedById' => 126,
                'shippedOn' => "15/04/2020",
                'printedOn' => "20/02/2003",
                'pickedOn' => "18/02/2004",
            ],
            'shipping' => [
                'shippingMethodId' => 11111,
                'boxes' => 2222,
                'reference' => "big-box",
                'weight' => "20kg",
            ],
            'releaseDate' => "20/20/2003",
            'createdOn' => "20/20/20002",
            'createdBy' => 042000,
            'orderRows' => [
                [
                    'productId' => 1111,
                    'quantity' => 20,
                    'locationId' => 88,
                    'externalRef' => "order-ref1"
                ],
                [
                    'productId' => 2222,
                    'quantity' => 440,
                    'locationId' => 7,
                    'externalRef' => "order-ref2"
                ]
            ],
            'sequence' => 54,
            'events' => [
                [
                    'occurred' => "20/20/0220",
                    'eventOwnerId' => 4344,
                    'eventCode' => "event-code1"
                ],
                [
                    'occurred' => "210/0/00001",
                    'eventOwnerId' => 1111,
                    'eventCode' => "event-code2"
                ]
            ],
            'labelUri' => "uri",
            'lastEventVersion' => 22,
        ];
    }

    /**
     * @return void
     */
    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $goodsOutNote = GoodsOutNote::fromJson($data);
        self::assertEquals($data, $goodsOutNote->toJson());
    }

    /**
     * @return void
     */
    public function testWithers()
    {
        $status = Status::create()
            ->withPacked(true)
            ->withPackedById(3)
            ->withPackedOn("20/20/2000")
            ->withPicked(true)
            ->withPrinted(true)
            ->withPickedById(13434)
            ->withPrintedById(23434)
            ->withShipped(false)
            ->withShippedById(126)
            ->withShippedOn("15/04/2020")
            ->withPrintedOn("20/02/2003")
            ->withPickedOn("18/02/2004");

        $shipping = Shipping::create()
            ->withShippingMethodId(11111)
            ->withBoxes(2222)
            ->withReference("big-box")
            ->withWeight("20kg");

        $order1 = Order::create()
            ->withProductId(1111)
            ->withQuantity(20)
            ->withLocationId(88)
            ->withExternalRef("order-ref1");

        $order2 = Order::create()
            ->withProductId(2222)
            ->withQuantity(440)
            ->withLocationId(7)
            ->withExternalRef("order-ref2");

        $orderRowCollection = OrderRowCollection::create()->of([$order1, $order2]);

        $event1 = Event::create()
            ->withEventCode("event-code1")
            ->withEventOwnerId(4344)
            ->withOccurred("20/20/0220");

        $event2 = Event::create()
            ->withEventCode("event-code2")
            ->withEventOwnerId(1111)
            ->withOccurred("210/0/00001");

        $eventCollection = EventCollection::create()->of([$event1, $event2]);

        $goodOutNote = GoodsOutNote::create()
            ->withOrderId(111)
            ->withWarehouseId(6657)
            ->withExternalRef("external-ref")
            ->withTransfer(true)
            ->withPriority(true)
            ->withStatus($status)
            ->withShipping($shipping)
            ->withReleaseDate("20/20/2003")
            ->withCreatedOn("20/20/20002")
            ->withCreatedBy(042000)
            ->withOrderRows($orderRowCollection)
            ->withSequence(54)
            ->withEvents($eventCollection)
            ->withLabelUri("uri")
            ->withLastEventVersion(22);

        self::assertEquals($this->getJsonData(), $goodOutNote->toJson());
    }

    /**
     * @return void
     */
    public function testGetters()
    {
        $data = $this->getJsonData();
        $goodsOutNote = GoodsOutNote::fromJson($data);

        self::assertEquals(111, $goodsOutNote->getOrderId());
        self::assertEquals(6657, $goodsOutNote->getWarehouseId());
        self::assertEquals("external-ref", $goodsOutNote->getExternalRef());
        self::assertEquals(true, $goodsOutNote->isTransfer());
        self::assertEquals(true, $goodsOutNote->isPriority());

        self::assertInstanceOf(Status::class, $goodsOutNote->getStatus());
        self::assertEquals(true, $goodsOutNote->getStatus()->isPacked());
        self::assertEquals(3, $goodsOutNote->getStatus()->getPackedById());
        self::assertEquals("20/20/2000", $goodsOutNote->getStatus()->getPackedOn());
        self::assertEquals(true, $goodsOutNote->getStatus()->isPicked());
        self::assertEquals(true, $goodsOutNote->getStatus()->isPrinted());
        self::assertEquals(13434, $goodsOutNote->getStatus()->getPickedById());
        self::assertEquals(23434, $goodsOutNote->getStatus()->getPrintedById());
        self::assertEquals(false, $goodsOutNote->getStatus()->isShipped());
        self::assertEquals(126, $goodsOutNote->getStatus()->getShippedById());
        self::assertEquals("15/04/2020", $goodsOutNote->getStatus()->getShippedOn());
        self::assertEquals("20/02/2003", $goodsOutNote->getStatus()->getPrintedOn());
        self::assertEquals("18/02/2004", $goodsOutNote->getStatus()->getPickedOn());

        self::assertInstanceOf(Shipping::class, $goodsOutNote->getShipping());
        self::assertEquals(11111, $goodsOutNote->getShipping()->getShippingMethodId());
        self::assertEquals(2222, $goodsOutNote->getShipping()->getBoxes());
        self::assertEquals("big-box", $goodsOutNote->getShipping()->getReference());
        self::assertEquals("20kg", $goodsOutNote->getShipping()->getWeight());

        self::assertEquals("20/20/2003", $goodsOutNote->getReleaseDate());
        self::assertEquals("20/20/20002", $goodsOutNote->getCreatedOn());
        self::assertEquals(042000, $goodsOutNote->getCreatedBy());

        self::assertInstanceOf(OrderRowCollection::class, $goodsOutNote->getOrderRows());
        $orderItems = iterator_to_array($goodsOutNote->getOrderRows()->getIterator());
        self::assertInstanceOf(Order::class, $orderItems[0]);
        self::assertInstanceOf(Order::class, $orderItems[1]);
        self::assertEquals(1111, $orderItems[0]->getProductId());
        self::assertEquals(20, $orderItems[0]->getQuantity());
        self::assertEquals(88, $orderItems[0]->getLocationId());
        self::assertEquals('order-ref1', $orderItems[0]->getExternalRef());
        self::assertEquals(2222, $orderItems[1]->getProductId());
        self::assertEquals(440, $orderItems[1]->getQuantity());
        self::assertEquals(7, $orderItems[1]->getLocationId());
        self::assertEquals('order-ref2', $orderItems[1]->getExternalRef());
        self::assertEquals(54, $goodsOutNote->getSequence());
        self::assertInstanceOf(EventCollection::class, $goodsOutNote->getEvents());
        self::assertEquals(  [
        [
            'occurred' => '20/20/0220',
            'eventOwnerId' => 4344,
            'eventCode' => 'event-code1'
        ],
        [
            'occurred' => '210/0/00001',
            'eventOwnerId' => 1111,
            'eventCode' => 'event-code2'
        ]
    ], $goodsOutNote->getEvents()->toJson());
        self::assertEquals("uri", $goodsOutNote->getLabelUri());
        self::assertEquals(22, $goodsOutNote->getLastEventVersion());
    }

    /**
     * @return void
     */
    public function testEquals()
    {
        $data = $this->getJsonData();
        $goodsOutNote1 = GoodsOutNote::fromJson($data);
        $goodsOutNote2 = GoodsOutNote::fromJson($data);
        self::assertTrue($goodsOutNote1->equals($goodsOutNote2));
    }
}
