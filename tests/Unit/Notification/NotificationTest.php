<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\Notification;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Notification;

class NotificationTest extends TestCase
{
    /**
     * @return array<string, mixed>
     */
    private function getJsonData(): array
    {
        return [
            'id' => '111',
            'raisedOn' => '573754837',
        ];
    }

    /**
     * @return void
     */
    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $notification = Notification::fromJson($data);
        self::assertEquals($data, $notification->toJson());
    }

    /**
     * @return void
     */
    public function testWithers()
    {
        $notification = Notification::create()
            ->withEntityId("111")
            ->withTimestamp("573754837");
        self::assertEquals($this->getJsonData(), $notification->toJson());
    }

    /**
     * @return void
     */
    public function testGetters()
    {
        $data = $this->getJsonData();
        $notification = Notification::fromJson($data);
        self::assertEquals("111", $notification->getEntityId());
        self::assertEquals("573754837", $notification->getTimestamp());
    }

    /**
     * @return void
     */
    public function testEquals()
    {
        $data = $this->getJsonData();
        $notification1 = Notification::fromJson($data);
        $notification2 = Notification::fromJson($data);
        self::assertTrue($notification1->equals($notification2));
    }
}
