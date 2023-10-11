<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\Order;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Order;
use SnowIO\BrightpearlDataModel\SalesOrder;

class SalesOrderTest extends TestCase
{

    /**
     * @return array
     */
    private function getJsonData(): string
    {
        $json = '{
            "id": 44,
            "customer": {
                "id": 10,
                "address": {
                    "addressFullName": "Test Test",
                    "companyName": "Test",
                    "addressLine1": "",
                    "addressLine2": "",
                    "addressLine3": "",
                    "addressLine4": "",
                    "postalCode": "",
                    "countryIsoCode": "GB",
                    "telephone": "",
                    "mobileTelephone": "",
                    "fax": "",
                    "email": ""
                }
            },
            "billing": {
                "contactId": 10,
                "address": {
                    "addressFullName": "Liam Toohey",
                    "companyName": "",
                    "addressLine1": "Apartment 15, 164 Oldham Road",
                    "addressLine2": "Popworks Building",
                    "addressLine3": "Manchester",
                    "addressLine4": "Greater Manchester",
                    "postalCode": "M4 6BQ",
                    "countryIsoCode": "GB",
                    "telephone": "07387088748",
                    "mobileTelephone": "",
                    "fax": "",
                    "email": "lt-buyer@amp.co"
                }
            },
            "ref": "SW51454",
            "externalRef": "1000558303_berlinottcordjetdark",
            "placedOn": "2023-10-09T17:54:59.000+01:00",
            "taxDate": "2023-10-09T00:00:00.000+01:00",
            "parentId": 0,
            "statusId": 2,
            "warehouseId": 2,
            "channelId": 1,
            "staffOwnerId": 0,
            "projectId": 0,
            "leadSourceId": 0,
            "teamId": 0,
            "priceListId": 1,
            "priceModeCode": "EXC",
            "currency": {
                "code": "GBP",
                "exchangeRate": "1.000000",
                "fixedExchangeRate": true
            },
            "delivery": {
                "address": {
                    "addressFullName": "Liam Toohey",
                    "companyName": "",
                    "addressLine1": "Apartment 15, 164 Oldham Road",
                    "addressLine2": "Popworks Building",
                    "addressLine3": "Manchester",
                    "addressLine4": "Greater Manchester",
                    "postalCode": "M4 6BQ",
                    "countryIsoCode": "GB",
                    "telephone": "07387088748",
                    "mobileTelephone": "",
                    "fax": "",
                    "email": "lt-buyer@amp.co"
                },
                "shippingMethodId": 1
            },
            "rows": [
                {
                    "id": 41,
                    "productId": 1179,
                    "name": "Aero",
                    "sku": "aerocoffeetablebp",
                    "quantity": "1.0000",
                    "taxCode": "T20",
                    "tax": "5.83",
                    "net": "29.1700",
                    "nominalCode": "4000",
                    "externalRef": "115",
                    "productPrice": "0.0000",
                    "discountPercentage": "0.00",
                    "sequence": 10,
                    "bundleChild": false,
                    "bundleParent": false,
                    "parentRowId": 0,
                    "taxClassId": 7,
                    "taxCalculator": "brightpearl",
                    "clonedFromId": 0
                },
                {
                    "id": 42,
                    "productId": 1288,
                    "name": "Shipping",
                    "sku": "aeroshelvnarrshinycop",
                    "quantity": "1.0000",
                    "taxCode": "T20",
                    "tax": "0.0000",
                    "net": "4.0000",
                    "nominalCode": "4040",
                    "externalRef": "000000061",
                    "productPrice": "0.0000",
                    "discountPercentage": "0.00",
                    "sequence": 10,
                    "bundleChild": false,
                    "bundleParent": false,
                    "parentRowId": 0,
                    "taxClassId": 7,
                    "taxCalculator": "manual",
                    "clonedFromId": 0
                }
            ],
            "total": {
                "net": "33.17",
                "tax": "5.83",
                "gross": "39.00",
                "baseNet": "33.17",
                "baseTax": "5.83",
                "baseGross": "39.00"
            },
            "orderPaymentStatus": "UNPAID",
            "allocationStatusCode": "ANR",
            "stockStatusCode": "NON",
            "shippingStatusCode": "NST",
            "createdBy": 4,
            "createdOn": "2023-10-09T17:54:59.000+01:00",
            "updatedOn": "2023-10-09T17:54:59.000+01:00",
            "invoice": {
                "invoiceReference": "",
                "taxDate": "2023-10-09T00:00:00.000+01:00",
                "dueDate": "2023-10-09T01:00:00.000+01:00"
            },
            "orderWeighting": 100,
            "costPriceListId": 1,
            "isCanceled": false,
            "customerId": 10
        }';
        return $json;
    }

    /**
     * @return void
     */
    public function testFromJsonToJson()
    {
        $json = json_decode($this->getJsonData(), true);
        $salesOrder = SalesOrder::fromJson($json);
        //$order = Order::fromJson($data);
        self::assertEquals($json, $salesOrder->toJson());
    }

    /**
     * @return void
     */
    public function testWithers()
    {
        $customer = Order\Customer::create()
            ->withId(123);

        $address1 = Order\Address::create()
            ->withAddressFullName("Snow avenue")
            ->withCompanyName("Snow")
            ->withAddressLine1("some street")
            ->withAddressLine2("some area")
            ->withAddressLine3("some town")
            ->withAddressLine4("some city")
            ->withPostalCode("AB12 ABC")
            ->withCountryIsoCode("GBR")
            ->withTelephone("1234567890")
            ->withEmail("test@domain.com");

        $address2 = Order\Address::create()
            ->withAddressFullName("Snow avenue 2")
            ->withCompanyName("Snow 2")
            ->withAddressLine1("some street 2")
            ->withAddressLine2("some area 2")
            ->withAddressLine3("some town 2")
            ->withAddressLine4("some city 2")
            ->withPostalCode("AB12 ABC 2")
            ->withCountryIsoCode("GBR 2")
            ->withTelephone("12345678902")
            ->withEmail("test2@domain.com");

        $billing = Order\Billing::create()
            ->withContactId(234)
            ->withAddress($address1);

        $currency = Order\Currency::create()
            ->withCode("ABC123")
            ->withFixedExchangeRate(true)
            ->withExchangeRate("1.1");

        $delivery = Order\Delivery::create()
            ->withDate("2023-09-01 16:03:53")
            ->withAddress($address2)
            ->withShippingMethodId(765);

        $row1 = Order\Row::create()
            ->withProductId(123456)
            ->withName("Product Example 1")
            ->withQuantity("123")
            ->withTaxCode("ABC")
            ->withNet("100")
            ->withTax("14")
            ->withNominalCode("ABCDEF")
            ->withExternalRef("FEDCBA");
        $row2 = Order\Row::create()
            ->withProductId(456789)
            ->withName("Product Example 2")
            ->withQuantity("456")
            ->withTaxCode("DEF")
            ->withNet("101")
            ->withTax("15")
            ->withNominalCode("ABCDEF2")
            ->withExternalRef("FEDCBA2");
        $rows = Order\RowCollection::of([$row1, $row2]);

        $order = Order::create()
            ->withCustomer($customer)
            ->withBilling($billing)
            ->withRef("ABC123XYZ890")
            ->withTaxDate("2023-09-01")
            ->withParentId(345)
            ->withStatusId(456)
            ->withWarehouseId(567)
            ->withStaffOwnerId(678)
            ->withProjectId(789)
            ->withChannelId(890)
            ->withExternalRef("098ZYX321CBA")
            ->withInstalledIntegrationInstanceId(901)
            ->withLeadSourceId(109)
            ->withTeamId(987)
            ->withPriceListId(876)
            ->withPriceModeCode("SOMECODE")
            ->withCurrency($currency)
            ->withDelivery($delivery)
            ->withRows($rows);

        self::assertEquals($this->getJsonData(), $order->toJson());
    }

    /**
     * @return void
     */
    public function testGetters()
    {
        $data = $this->getJsonData();
        $order = Order::fromJson($data);

        self::assertInstanceOf(Order\Customer::class, $order->getCustomer());
        self::assertEquals(123, $order->getCustomer()->getId());

        self::assertInstanceOf(Order\Billing::class, $order->getBilling());
        self::assertEquals(234, $order->getBilling()->getContactId());
        self::assertInstanceOf(Order\Address::class, $order->getBilling()->getAddress());
        self::assertEquals("Snow avenue", $order->getBilling()->getAddress()->getAddressFullName());
        self::assertEquals("Snow", $order->getBilling()->getAddress()->getCompanyName());
        self::assertEquals("some street", $order->getBilling()->getAddress()->getAddressLine1());
        self::assertEquals("some area", $order->getBilling()->getAddress()->getAddressLine2());
        self::assertEquals("some town", $order->getBilling()->getAddress()->getAddressLine3());
        self::assertEquals("some city", $order->getBilling()->getAddress()->getAddressLine4());
        self::assertEquals("AB12 ABC", $order->getBilling()->getAddress()->getPostalCode());
        self::assertEquals("GBR", $order->getBilling()->getAddress()->getCountryIsoCode());
        self::assertEquals("1234567890", $order->getBilling()->getAddress()->getTelephone());
        self::assertEquals("test@domain.com", $order->getBilling()->getAddress()->getEmail());

        self::assertEquals("ABC123XYZ890", $order->getRef());
        self::assertEquals("2023-09-01", $order->getTaxDate());
        self::assertEquals(345, $order->getParentId());
        self::assertEquals(456, $order->getStatusId());
        self::assertEquals(567, $order->getWarehouseId());
        self::assertEquals(678, $order->getStaffOwnerId());
        self::assertEquals(789, $order->getProjectId());
        self::assertEquals(890, $order->getChannelId());
        self::assertEquals("098ZYX321CBA", $order->getExternalRef());
        self::assertEquals(901, $order->getInstalledIntegrationInstanceId());
        self::assertEquals(109, $order->getLeadSourceId());
        self::assertEquals(987, $order->getTeamId());
        self::assertEquals(876, $order->getPriceListId());
        self::assertEquals("SOMECODE", $order->getPriceModeCode());

        self::assertInstanceOf(Order\Currency::class, $order->getCurrency());
        self::assertEquals("ABC123", $order->getCurrency()->getCode());
        self::assertTrue($order->getCurrency()->getFixedExchangeRate());
        self::assertEquals("1.1", $order->getCurrency()->getExchangeRate());

        self::assertInstanceOf(Order\Delivery::class, $order->getDelivery());
        self::assertEquals("2023-09-01 16:03:53", $order->getDelivery()->getDate());
        self::assertEquals(765, $order->getDelivery()->getShippingMethodId());
        self::assertInstanceOf(Order\Address::class, $order->getDelivery()->getAddress());
        self::assertEquals("Snow avenue 2", $order->getDelivery()->getAddress()->getAddressFullName());
        self::assertEquals("Snow 2", $order->getDelivery()->getAddress()->getCompanyName());
        self::assertEquals("some street 2", $order->getDelivery()->getAddress()->getAddressLine1());
        self::assertEquals("some area 2", $order->getDelivery()->getAddress()->getAddressLine2());
        self::assertEquals("some town 2", $order->getDelivery()->getAddress()->getAddressLine3());
        self::assertEquals("some city 2", $order->getDelivery()->getAddress()->getAddressLine4());
        self::assertEquals("AB12 ABC 2", $order->getDelivery()->getAddress()->getPostalCode());
        self::assertEquals("GBR 2", $order->getDelivery()->getAddress()->getCountryIsoCode());
        self::assertEquals("12345678902", $order->getDelivery()->getAddress()->getTelephone());
        self::assertEquals("test2@domain.com", $order->getDelivery()->getAddress()->getEmail());

        self::assertInstanceOf(Order\RowCollection::class, $order->getRows());
        $rows = iterator_to_array($order->getRows()->getIterator());
        self::assertInstanceOf(Order\Row::class, $rows[0]);
        self::assertEquals(123456, $rows[0]->getProductId());
        self::assertEquals("Product Example 1", $rows[0]->getName());
        self::assertEquals("123", $rows[0]->getQuantity());
        self::assertEquals("ABC", $rows[0]->getTaxCode());
        self::assertEquals("100", $rows[0]->getNet());
        self::assertEquals("14", $rows[0]->getTax());
        self::assertEquals("ABCDEF", $rows[0]->getNominalCode());
        self::assertEquals("FEDCBA", $rows[0]->getExternalRef());

        self::assertInstanceOf(Order\Row::class, $rows[1]);
        self::assertEquals(456789, $rows[1]->getProductId());
        self::assertEquals("Product Example 2", $rows[1]->getName());
        self::assertEquals("456", $rows[1]->getQuantity());
        self::assertEquals("DEF", $rows[1]->getTaxCode());
        self::assertEquals("101", $rows[1]->getNet());
        self::assertEquals("15", $rows[1]->getTax());
        self::assertEquals("ABCDEF2", $rows[1]->getNominalCode());
        self::assertEquals("FEDCBA2", $rows[1]->getExternalRef());
    }

    /**
     * @return void
     */
    public function testEquals()
    {
        $data = $this->getJsonData();
        $order1 = Order::fromJson($data);
        $order2 = Order::fromJson($data);
        self::assertTrue($order1->equals($order2));
    }
}
