<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\Order;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Order;
use SnowIO\BrightpearlDataModel\Order\GetOrder;
use SnowIO\BrightpearlDataModel\Order\Row;
use SnowIO\BrightpearlDataModel\Order\RowCollection;

class GetOrderTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            "id" => 123,
            "orderTypeCode" => "PO",
            "reference" => "SW51454",
            "parentOrderId" => "273SWNX",
            "priceListId" => 1,
            "priceModeCode" => "INC",
            "placedOn" => "2011-09-29T11:12:24.000+01:00",
            "orderStatus" => [
                "orderStatusId" => 6
            ],
            "delivery" => [
                "deliveryDate" => "2011-09-29T11:12:24.000+01:00",
                "shippingMethodId" => 1
            ],
            "invoices" => [
                [
                    "taxDate" => "2011-09-29T11:12:24.000+01:00",
                ]
            ],
            "currency" => [
                "orderCurrencyCode" => "GBP",
                "fixedExchangeRate" => true,
                "exchangeRate" => "1.23"
            ],
            "contactId" => 9,
            "parties" => [
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
                    "addressLine1" => 'Line1',
                    "addressLine2" => 'Line2',
                    "addressLine3" => 'Line3',
                    "addressLine4" => 'Line4',
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
                    "addressLine1" => 'Line1',
                    "addressLine2" => 'Line2',
                    "addressLine3" => 'Line3',
                    "addressLine4" => 'Line4',
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
            ],
            "warehouseId" => 2,
            "assignment" => [
                "current" => [
                    "staffOwnerContactId" => 123,
                    "projectId" => 456,
                    "channelId" => 789,
                    "leadSourceId" => 101112,
                    "teamId" => 131415
                ],
            ],
            'orderRows' => [
                "10" => [
                    "orderRowSequence" => "10",
                    "productId" => "1000",
                    "productName" => "tshirt",
                    "productSku" => "001b",
                    "quantity" => [
                        "magnitude" => 1
                    ],
                    "externalRef" => "ref123",
                    "taxCode" => null,
                    "net" => null,
                    "tax" => null,
                    "nominalCode" => null,
                ]
            ],
            'customFields' => [
                "PCF_O_ODEL" => "2024-01-24T00:00:00.000Z"
            ],
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $order = GetOrder::fromJson($data);
        self::assertEquals($data, $order->toJson());
    }

    public function testWithers()
    {
        $partiesDelivery = Order\Parties\Delivery::create()
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
            ->withEmail("test@domain.com");

        $partiesSupplier = Order\Parties\Supplier::create()
            ->withContactId(1)
            ->withAddressFullName('test')
            ->withCompanyName('test')
            ->withEmail('test@domain.com')
            ->withAddressLine1('Line1')
            ->withAddressLine2('Line2')
            ->withAddressLine3('Line3')
            ->withAddressLine4('Line4')
            ->withPostalCode('test')
            ->withCountry('test')
            ->withCountryId(1)
            ->withCountryIsoCode('test')
            ->withTelephone('999999999')
            ->withMobileTelephone('888888888')
            ->withFax('555555555555')
            ->withCountryIsoCode3('XY');

        $partiesBilling = Order\Parties\Billing::create()
            ->withContactId(1)
            ->withAddressFullName('test')
            ->withCompanyName('test')
            ->withEmail('test@domain.com')
            ->withAddressLine1('Line1')
            ->withAddressLine2('Line2')
            ->withAddressLine3('Line3')
            ->withAddressLine4('Line4')
            ->withPostalCode('test')
            ->withCountry('test')
            ->withCountryId(1)
            ->withCountryIsoCode('test')
            ->withTelephone('999999999')
            ->withMobileTelephone('888888888')
            ->withFax('555555555555')
            ->withCountryIsoCode3('XY');

        $currency = Order\Currency::create()
            ->withCode("GBP")
            ->withFixedExchangeRate(true)
            ->withExchangeRate("1.23");

        $current = Order\Assignment\Current::create()
            ->withStaffOwnerContactId(123)
            ->withProjectId(456)
            ->withChannelId(789)
            ->withLeadSourceId(101112)
            ->withTeamId(131415);

        $assignment = Order\Assignment::create()
            ->withCurrent($current);

        $delivery = Order\Delivery::create()
            ->withDate("2011-09-29T11:12:24.000+01:00")
            ->withShippingMethodId(1);

        $status = Order\Status::create()
            ->withId(6);

        $invoice = Order\Invoice::create()
            ->withTaxDate("2011-09-29T11:12:24.000+01:00");

        $invoiceCollection = Order\InvoiceCollection::fromJson([$invoice->toJson()]);

        $order = GetOrder::create()
            ->withId(123)
            ->withOrderTypeCode("PO")
            ->withReference("SW51454")
            ->withParentOrderId("273SWNX")
            ->withPriceListId(1)
            ->withPriceModeCode("INC")
            ->withPlacedOn("2011-09-29T11:12:24.000+01:00")
            ->withOrderStatus($status)
            ->withDelivery($delivery)
            ->withInvoices($invoiceCollection)
            ->withCurrency($currency)
            ->withContactId(9)
            ->withOrderRows(RowCollection::of([
                10 => Order\Row::create()
                    ->withOrderRowSequence(10)
                    ->withProductId(1000)
                    ->withProductName('tshirt')
                    ->withProductSku('001b')
                    ->withExternalRef('ref123')
                    ->withQuantity(1),
            ]))
            ->withParties(
                Order\Parties::create()
                ->withDelivery($partiesDelivery)
                ->withSupplier($partiesSupplier)
                ->withBilling($partiesBilling)
            )
            ->withWareHouseId(2)
            ->withAssignment($assignment)
            ->withCustomFields([
                'PCF_O_ODEL' => '2024-01-24T00:00:00.000Z'
            ]);
        self::assertEquals($this->getJsonData(), $order->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $order = GetOrder::fromJson($data);

        self::assertEquals("PO", $order->getOrderTypeCode());
        self::assertEquals("SW51454", $order->getReference());
        self::assertEquals("273SWNX", $order->getParentOrderId());
        self::assertEquals(1, $order->getPriceListId());
        self::assertEquals("INC", $order->getPriceModeCode());
        self::assertEquals("2011-09-29T11:12:24.000+01:00", $order->getPlacedOn());
        self::assertInstanceOf(Order\Status::class, $order->getOrderStatus());
        self::assertEquals(6, $order->getOrderStatus()->getId());

        self::assertInstanceOf(Order\Delivery::class, $order->getDelivery());
        self::assertEquals("2011-09-29T11:12:24.000+01:00", $order->getDelivery()->getDate());
        self::assertEquals(1, $order->getDelivery()->getShippingMethodId());

        self::assertInstanceOf(Order\InvoiceCollection::class, $order->getInvoices());
        $invoiceRows = iterator_to_array($order->getInvoices()->getIterator());
        self::assertInstanceOf(Order\Invoice::class, $invoiceRows[0]);
        self::assertEquals("2011-09-29T11:12:24.000+01:00", $invoiceRows[0]->getTaxDate());

        self::assertInstanceOf(Order\Currency::class, $order->getCurrency());
        self::assertEquals("GBP", $order->getCurrency()->getCode());
        self::assertEquals(true, $order->getCurrency()->getFixedExchangeRate());
        self::assertEquals("1.23", $order->getCurrency()->getExchangeRate());

        self::assertEquals(9, $order->getContactId());

        self::assertInstanceOf(Order\Parties::class, $order->getParties());
        self::assertInstanceOf(Order\Parties\Delivery::class, $order->getParties()->getDelivery());
        self::assertInstanceOf(Order\Parties\Billing::class, $order->getParties()->getBilling());
        self::assertInstanceOf(Order\Parties\Supplier::class, $order->getParties()->getSupplier());

        self::assertEquals("Snow avenue", $order->getParties()->getDelivery()->getAddressFullName());
        self::assertEquals("snow", $order->getParties()->getDelivery()->getCompanyName());
        self::assertEquals("some street", $order->getParties()->getDelivery()->getAddressLine1());
        self::assertEquals("some area", $order->getParties()->getDelivery()->getAddressLine2());
        self::assertEquals("some town", $order->getParties()->getDelivery()->getAddressLine3());
        self::assertEquals("some city", $order->getParties()->getDelivery()->getAddressLine4());
        self::assertEquals("AB12 ABC", $order->getParties()->getDelivery()->getPostalCode());
        self::assertEquals(3, $order->getParties()->getDelivery()->getCountryId());
        self::assertEquals("GBR", $order->getParties()->getDelivery()->getCountryIsoCode());
        self::assertEquals("1234567890", $order->getParties()->getDelivery()->getTelephone());
        self::assertEquals("1234567890", $order->getParties()->getDelivery()->getMobileTelephone());
        self::assertEquals("1234567890", $order->getParties()->getDelivery()->getFax());
        self::assertEquals("test@domain.com", $order->getParties()->getDelivery()->getEmail());

        self::assertEquals("test", $order->getParties()->getSupplier()->getCompanyName());
        self::assertEquals("test", $order->getParties()->getSupplier()->getAddressFullName());
        self::assertEquals("test@domain.com", $order->getParties()->getSupplier()->getEmail());
        self::assertEquals("Line1", $order->getParties()->getSupplier()->getAddressLine1());
        self::assertEquals("Line2", $order->getParties()->getSupplier()->getAddressLine2());
        self::assertEquals("Line3", $order->getParties()->getSupplier()->getAddressLine3());
        self::assertEquals("Line4", $order->getParties()->getSupplier()->getAddressLine4());
        self::assertEquals("test", $order->getParties()->getSupplier()->getPostalCode());
        self::assertEquals("test", $order->getParties()->getSupplier()->getCountry());
        self::assertEquals(1, $order->getParties()->getSupplier()->getCountryId());
        self::assertEquals('test', $order->getParties()->getSupplier()->getCountryIsoCode());
        self::assertEquals('999999999', $order->getParties()->getSupplier()->getTelephone());
        self::assertEquals('888888888', $order->getParties()->getSupplier()->getMobileTelephone());
        self::assertEquals('555555555555', $order->getParties()->getSupplier()->getFax());
        self::assertEquals('XY', $order->getParties()->getSupplier()->getCountryIsoCode3());


        self::assertEquals("test", $order->getParties()->getBilling()->getCompanyName());
        self::assertEquals("test", $order->getParties()->getBilling()->getAddressFullName());
        self::assertEquals("test@domain.com", $order->getParties()->getBilling()->getEmail());
        self::assertEquals("Line1", $order->getParties()->getBilling()->getAddressLine1());
        self::assertEquals("Line2", $order->getParties()->getBilling()->getAddressLine2());
        self::assertEquals("Line3", $order->getParties()->getBilling()->getAddressLine3());
        self::assertEquals("Line4", $order->getParties()->getBilling()->getAddressLine4());
        self::assertEquals("test", $order->getParties()->getBilling()->getPostalCode());
        self::assertEquals("test", $order->getParties()->getBilling()->getCountry());
        self::assertEquals(1, $order->getParties()->getBilling()->getCountryId());
        self::assertEquals('test', $order->getParties()->getBilling()->getCountryIsoCode());
        self::assertEquals('999999999', $order->getParties()->getBilling()->getTelephone());
        self::assertEquals('888888888', $order->getParties()->getBilling()->getMobileTelephone());
        self::assertEquals('555555555555', $order->getParties()->getBilling()->getFax());
        self::assertEquals('XY', $order->getParties()->getBilling()->getCountryIsoCode3());


        self::assertEquals(2, $order->getWarehouseId());

        self::assertInstanceOf(Order\Assignment::class, $order->getAssignment());
        self::assertInstanceOf(Order\Assignment\Current::class, $order->getAssignment()->getCurrent());

        self::assertEquals(123, $order->getAssignment()->getCurrent()->getStaffOwnerContactId());
        self::assertEquals(456, $order->getAssignment()->getCurrent()->getProjectId());
        self::assertEquals(789, $order->getAssignment()->getCurrent()->getChannelId());
        self::assertEquals(101112, $order->getAssignment()->getCurrent()->getLeadSourceId());
        self::assertEquals(131415, $order->getAssignment()->getCurrent()->getTeamId());
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $order1 = GetOrder::fromJson($data);
        $order2 = GetOrder::fromJson($data);
        self::assertTrue($order1->equals($order2));
    }
}
