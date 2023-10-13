<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\PostalAddress;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\PostalAddress;

class PostalAddressTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            'addressLine1' => 'flat 7001',
            'addressLine2' => "apple road",
            'addressLine3' => "manchester",
            'addressLine4' => "earth",
            'postalCode' => "M1 444",
            'countryIsoCode' => "M4"
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $postalAddress = PostalAddress::fromJson($data);
        self::assertEquals($data, $postalAddress->toJson());
    }

    public function testWithers()
    {
        $postalAddress = PostalAddress::create()
            ->withAddressLine1("flat 7001")
            ->withAddressLine2("apple road")
            ->withAddressLine3("manchester")
            ->withAddressLine4("earth")
            ->withPostalCode("M1 444")
            ->withCountryIsoCode("M4");

        self::assertEquals($this->getJsonData(), $postalAddress->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $postalAddress = PostalAddress::fromJson($data);
        self::assertEquals("flat 7001", $postalAddress->getAddressLine1());
        self::assertEquals("apple road", $postalAddress->getAddressLine2());
        self::assertEquals("manchester", $postalAddress->getAddressLine3());
        self::assertEquals("earth", $postalAddress->getAddressLine4());
        self::assertEquals("M1 444", $postalAddress->getPostalCode());
        self::assertEquals("M4", $postalAddress->getCountryIsoCode());
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $postalAddress1 = PostalAddress::fromJson($data);
        $postalAddress2 = PostalAddress::fromJson($data);
        self::assertTrue($postalAddress1->equals($postalAddress2));
    }
}
