<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\Order;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Order;

class OrderTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
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
                    'contactId' => null,
                    'country' => null,
                    'countryIsoCode3' => null
                ],
                "billing" => [
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
                    'contactId' => null,
                    'country' => null,
                    'countryIsoCode3' => null
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
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $order = Order::fromJson($data);
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

        $order = Order::create()
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
            ->withParties(Order\Parties::create()
                ->withDelivery($partiesDelivery)
                ->withSupplier(Order\Parties\Supplier::create())
                ->withBilling(Order\Parties\Billing::create())
            )
            ->withWareHouseId(2)
            ->withAssignment($assignment);
        self::assertEquals($this->getJsonData(), $order->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $order = Order::fromJson($data);

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
        $order1 = Order::fromJson($data);
        $order2 = Order::fromJson($data);
        self::assertTrue($order1->equals($order2));
    }
}
