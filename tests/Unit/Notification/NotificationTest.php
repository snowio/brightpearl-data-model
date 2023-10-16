<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\Notification;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Notification;

class NotificationTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            'id' => '111',
            'raisedOn' => '573754837',
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $notification = Notification::fromJson($data);
        self::assertEquals($data, $notification->toJson());
    }

    public function testWithers()
    {
        $notification = Notification::create()
            ->withEntityId("111")
            ->withTimestamp("573754837");
        self::assertEquals($this->getJsonData(), $notification->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $notification = Notification::fromJson($data);
        self::assertEquals("111", $notification->getEntityId());
        self::assertEquals("573754837", $notification->getTimestamp());
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $notification1 = Notification::fromJson($data);
        $notification2 = Notification::fromJson($data);
        self::assertTrue($notification1->equals($notification2));
    }
}
