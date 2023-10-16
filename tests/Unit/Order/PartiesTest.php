<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\Order;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Order\Parties;
use SnowIO\BrightpearlDataModel\Order\Parties\Billing;
use SnowIO\BrightpearlDataModel\Order\Parties\Delivery;
use SnowIO\BrightpearlDataModel\Order\Parties\Supplier;

class PartiesTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            "delivery" => [
                "addressFullName" => "Snow avenue",
                "companyName" => "snow",
                "addressLine1" => "some street",
                "addressLine2" => "some area",
                "addressLine3" => "some town",
                "addressLine4" => "some city",
                "postalCode" => "AB12 ABC",
                "countryId" => "3",
                "countryIsoCode" => "GBR",
                "telephone" => "1234567890",
                "mobileTelephone" => "1234567890",
                "fax" => "1234567890",
                "email" => "test@domain.com",
                'country' => null,
                'countryIsoCode3' => null,
            ],
            "supplier" => [
                "addressFullName" => 'test',
                "companyName" => 'test',
                "addressLine1" => 'test',
                "addressLine2" => 'test',
                "addressLine3" => 'test',
                "addressLine4" => 'test',
                "postalCode" => 'test',
                "countryId" => 1,
                "countryIsoCode" => 'test',
                "telephone" => '999999999',
                "mobileTelephone" => '888888888',
                "fax" => '555555555555',
                "email" => 'test@domain.com',
                'contactId' => 1,
                'country' => 'test',
                'countryIsoCode3' => 'XY'
            ],
            "billing" => [
                "addressFullName" => 'test',
                "companyName" => 'test',
                "addressLine1" => 'test',
                "addressLine2" => 'test',
                "addressLine3" => 'test',
                "addressLine4" => 'test',
                "postalCode" => 'test',
                "countryId" => 1,
                "countryIsoCode" => 'test',
                "telephone" => '999999999',
                "mobileTelephone" => '888888888',
                "fax" => '555555555555',
                "email" => 'test@domain.com',
                'contactId' => 1,
                'country' => 'test',
                'countryIsoCode3' => 'XY'
            ],
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $parties = Parties::fromJson($data);
        self::assertEquals($data, $parties->toJson());

        /** @var Billing $billing */
        $billing = Billing::create()->withContactId(1);

        $parties = Parties::create()
            ->withBilling($billing);

        self::assertEquals([
            "supplier" => [],
            "delivery" => [],
            "billing" => [
                'contactId' => 1,
                "addressFullName" => null,
                "companyName" => null,
                "addressLine1" => null,
                "addressLine2" => null,
                "addressLine3" => null,
                "addressLine4" => null,
                "postalCode" => null,
                "countryId" => null,
                "countryIsoCode" => null,
                "telephone" => null,
                "mobileTelephone" => null,
                "fax" => null,
                "email" => null,
                'country' => null,
                'countryIsoCode3' => null
            ],
        ], $parties->toJson());

    }

    public function testWithers()
    {
        $row = Parties::create()
            ->withSupplier(Supplier::create()
                ->withContactId(1)
                ->withAddressFullName('test')
                ->withCompanyName('test')
                ->withEmail('test@domain.com')
                ->withAddressLine1('test')
                ->withAddressLine2('test')
                ->withAddressLine3('test')
                ->withAddressLine4('test')
                ->withPostalCode('test')
                ->withCountry('test')
                ->withCountryId(1)
                ->withCountryIsoCode('test')
                ->withTelephone('999999999')
                ->withMobileTelephone('888888888')
                ->withFax('555555555555')
                ->withCountryIsoCode3('XY'))
            ->withBilling(Billing::create()
                ->withContactId(1)
                ->withAddressFullName('test')
                ->withCompanyName('test')
                ->withEmail('test@domain.com')
                ->withAddressLine1('test')
                ->withAddressLine2('test')
                ->withAddressLine3('test')
                ->withAddressLine4('test')
                ->withPostalCode('test')
                ->withCountry('test')
                ->withCountryId(1)
                ->withCountryIsoCode('test')
                ->withTelephone('999999999')
                ->withMobileTelephone('888888888')
                ->withFax('555555555555')
                ->withCountryIsoCode3('XY'))
            ->withDelivery(Delivery::create()
                ->withAddressFullName("Snow avenue")
                ->withCompanyName("snow")
                ->withAddressLine1("some street")
                ->withAddressLine2("some area")
                ->withAddressLine3("some town")
                ->withAddressLine4("some city")
                ->withPostalCode("AB12 ABC")
                ->withCountryId("3")
                ->withCountryIsoCode("GBR")
                ->withTelephone("1234567890")
                ->withMobileTelephone("1234567890")
                ->withFax("1234567890")
                ->withEmail("test@domain.com"));

        self::assertEquals($this->getJsonData(), $row->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $row = Parties::fromJson($data);

        self::assertEquals(1, $row->getBilling()->getContactId());

    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $order1 = Parties::fromJson($data);
        $order2 = Parties::fromJson($data);
        self::assertTrue($order1->equals($order2));
    }
}
