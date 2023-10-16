<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\Order;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Order\Customer;

class CustomerTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            'id' => 123
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $customerPayment = Customer::fromJson($data);
        self::assertEquals($data, $customerPayment->toJson());
    }

    public function testWithers()
    {
        $customer = Customer::create()
            ->withId(123);
        self::assertEquals($this->getJsonData(), $customer->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $customer = Customer::fromJson($data);
        self::assertEquals("123", $customer->getId());
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $customer1 = Customer::fromJson($data);
        $customer2 = Customer::fromJson($data);
        self::assertTrue($customer1->equals($customer2));
    }
}
