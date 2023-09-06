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
            'orderId' => 2222,
            'warehouseId' => 222,
            'externalRef' => "eee",
            'transfer' => " ddd",
            'priority' => "3",
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
                'shippingMethodId' => 111111,
                'boxes' => 2222,
                'reference' => "big-box",
                'weight' => "20kg",
            ],
            'releaseDate' => "20/20/2003",
            'createdOn' => "20/20/20002",
            'createdBy' => 042000,
            'orderRows' => [
                'items' => [
                    'productId' => 1111,
                    'quantity' => 20,
                    'locationId' => 88,
                    'externalRef' => "order-ref",
                ]
            ],
            'sequence' => 54,
            'events' => [
                'items' => [
                    'occurred' => "event-code",
                    'eventOwnerId' => 4344,
                    'eventCode' => "20/20/0220",
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

        $order = Order::create()
            ->withProductId(1111)
            ->withQuantity(20)
            ->withLocationId(88)
            ->withExternalRef("order-ref");

        $orderRowCollection = OrderRowCollection::create()->fromJson($order->toJson());

        $event = Event::create()
            ->withEventCode("event-code")
            ->withEventOwnerId(4344)
            ->withOccurred("20/20/0220");

        $eventCollection = EventCollection::create()->fromJson($event->toJson());

        $goodOutNote = GoodsOutNote::create()
            ->withOrderId(111)
            ->withWarehouseId(6657)
            ->withExternalRef("ref")
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