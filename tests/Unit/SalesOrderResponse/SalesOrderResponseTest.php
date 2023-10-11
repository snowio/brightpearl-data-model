<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\SalesOrderResponse;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\SalesOrderResponse;

class SalesOrderResponseTest extends TestCase
{
    /**
     * @return array
     */
    private function getJsonData(): array
    {
        return [
            'id' => 123,
            'customer' => [
                'id' => 123,
                'address' => [
                    'addressFullName' => "SomeFullName",
                    'companyName' => "SomeCompanyName",
                    'addressLine1' => "SomeAddressLine1",
                    'addressLine2' => "SomeAddressLine2",
                    'addressLine3' => "SomeAddressLine3",
                    'addressLine4' => "SomeAddressLine4",
                    'postalcode' => "SomePostalcode",
                    'countryIsoCode' => "GB",
                    'telephone' => "0987654321",
                    'mobileTelephone' => "1234567890",
                    'email' => "example@test.com",
                    'fax' => "1236547890"
                ]
            ],
            'billing' => [
                'contactId' => 123,
                'address' => [
                    'addressFullName' => "SomeFullName",
                    'companyName' => "SomeCompanyName",
                    'addressLine1' => "SomeAddressLine1",
                    'addressLine2' => "SomeAddressLine2",
                    'addressLine3' => "SomeAddressLine3",
                    'addressLine4' => "SomeAddressLine4",
                    'postalcode' => "SomePostalcode",
                    'countryIsoCode' => "GB",
                    'telephone' => "0987654321",
                    'mobileTelephone' => "1234567890",
                    'email' => "example@test.com",
                    'fax' => "1236547890"
                ]
            ],
            'ref' => "SomeRef",
            'placedOn' => "2023-09-01 01:03:53",
            'parentId' => 234,
            'statusId' => 345,
            'warehouseId' => 456,
            'channelId' => 567,
            'staffOwnerId' => 678,
            'projectId' => 789,
            'leadSourceId' => 890,
            'teamId' => 987,
            'priceListId' => 876,
            'priceModeCode' => "SomePriceModeCode",
            'delivery' => [
                'shippingMethodId' => 123,
                'address' => [
                    'addressFullName' => "SomeFullName",
                    'companyName' => "SomeCompanyName",
                    'addressLine1' => "SomeAddressLine1",
                    'addressLine2' => "SomeAddressLine2",
                    'addressLine3' => "SomeAddressLine3",
                    'addressLine4' => "SomeAddressLine4",
                    'postalcode' => "SomePostalcode",
                    'countryIsoCode' => "GB",
                    'telephone' => "0987654321",
                    'mobileTelephone' => "1234567890",
                    'email' => "example@test.com",
                    'fax' => "1236547890"
                ]
            ],
            'currency' => [
                "fixedExchangeRate" => true,
                "exchangeRate" => "SomeExchangeRate",
                "code" => "SomeCode"
            ],
            'rows' => [
                [
                    'id' => 123,
                    'productId' => 234,
                    'name' => "SomeName",
                    'sku' => "SomeSku",
                    'quantity' => "SomeQuantity",
                    'taxCode' => "SomeTaxCode",
                    'tax' => "SomeTax",
                    'net' => "SomeNet",
                    'nominalCode' => "SomeNominalCode",
                    'productPrice' => "SomeProductPrice",
                    'discountPercentage' => "SomeDiscountPercentage",
                    'sequence' => 345,
                    'bundleChild' => true,
                    'bundleParent' => false,
                    'parentRowId' => 456,
                    'taxClassId' => 567,
                    'taxCalculator' => "SomeTaxCalculator",
                    'clonedFromId' => 678,
                ],
                [
                    'id' => 321,
                    'productId' => 423,
                    'name' => "SomeName2",
                    'sku' => "SomeSku2",
                    'quantity' => "SomeQuantity2",
                    'taxCode' => "SomeTaxCode2",
                    'tax' => "SomeTax2",
                    'net' => "SomeNet2",
                    'nominalCode' => "SomeNominalCode2",
                    'productPrice' => "SomeProductPrice2",
                    'discountPercentage' => "SomeDiscountPercentage2",
                    'sequence' => 543,
                    'bundleChild' => false,
                    'bundleParent' => true,
                    'parentRowId' => 654,
                    'taxClassId' => 765,
                    'taxCalculator' => "SomeTaxCalculator2",
                    'clonedFromId' => 876,
                ],
            ],
            'total' => [
                'net' => "SomeNet",
                'tax' => "SomeTax",
                'gross' => "SomeGross",
                'baseNet' => "SomeBaseNet",
                'baseTax' => "SomeBaseTax",
                'baseGross' => "SomeBaseGross"
            ],
            'stockStatusCode' => "SomeStockStatusCode",
            'createdBy' => 765,
            'createdOn' => "2023-09-01 02:03:53",
            'updatedOn' => "2023-09-01 03:03:53",
            'invoice' => [
                'invoiceReference' => "SomeInvoiceRef",
                'taxDate' => "2023-09-01 04:03:53",
                'dueDate' => "2023-09-01 05:03:53"
            ],
            'orderWeighting' => 654,
            'costPriceListId' => 543,
            'customerId' => 432,
            'taxDate' => "2023-09-01 04:03:53",
        ];
    }

    /**
     * @return void
     */
    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $order = SalesOrderResponse::fromJson($data);
        self::assertEquals($data, $order->toJson());
    }

    /**
     * @return void
     */
    public function testWithers()
    {
        $address = SalesOrderResponse\Customer\Address::create()
            ->withAddressFullName("SomeFullName")
            ->withCompanyName("SomeCompanyName")
            ->withAddressLine1("SomeAddressLine1")
            ->withAddressLine2("SomeAddressLine2")
            ->withAddressLine3("SomeAddressLine3")
            ->withAddressLine4("SomeAddressLine4")
            ->withPostalCode("SomePostalcode")
            ->withCountryIsoCode("GB")
            ->withTelephone("0987654321")
            ->withMobileTelephone("1234567890")
            ->withEmail("example@test.com")
            ->withFax("1236547890");

        $customer = SalesOrderResponse\Customer::create()
            ->withId(123)
            ->withAddress($address);
        $billing = SalesOrderResponse\Billing::create()
            ->withContactId(123)
            ->withAddress($address);

        $row1 = SalesOrderResponse\Row::create()
            ->withId(123)
            ->withProductId(234)
            ->withName("SomeName")
            ->withSku("SomeSku")
            ->withQuantity("SomeQuantity")
            ->withTaxCode("SomeTaxCode")
            ->withTax("SomeTax")
            ->withNet("SomeNet")
            ->withNominalCode("SomeNominalCode")
            ->withProductPrice("SomeProductPrice")
            ->withDiscountPercentage("SomeDiscountPercentage")
            ->withSequence(345)
            ->withBundleChild(true)
            ->withBundleParent(false)
            ->withParentRowId(456)
            ->withTaxClassId(567)
            ->withTaxCalculator("SomeTaxCalculator")
            ->withClonedFromId(678);
        $row2 = SalesOrderResponse\Row::create()
            ->withId(321)
            ->withProductId(423)
            ->withName("SomeName2")
            ->withSku("SomeSku2")
            ->withQuantity("SomeQuantity2")
            ->withTaxCode("SomeTaxCode2")
            ->withTax("SomeTax2")
            ->withNet("SomeNet2")
            ->withNominalCode("SomeNominalCode2")
            ->withProductPrice("SomeProductPrice2")
            ->withDiscountPercentage("SomeDiscountPercentage2")
            ->withSequence(543)
            ->withBundleChild(false)
            ->withBundleParent(true)
            ->withParentRowId(654)
            ->withTaxClassId(765)
            ->withTaxCalculator("SomeTaxCalculator2")
            ->withClonedFromId(876);
        $rows = SalesOrderResponse\RowCollection::of([$row1, $row2]);

        $total = SalesOrderResponse\Total::create()
            ->withNet("SomeNet")
            ->withTax("SomeTax")
            ->withGross("SomeGross")
            ->withBaseNet("SomeBaseNet")
            ->withBaseTax("SomeBaseTax")
            ->withBaseGross("SomeBaseGross");

        $invoice = SalesOrderResponse\Invoice::create()
            ->withInvoiceReference("SomeInvoiceRef")
            ->withTaxDate("2023-09-01 04:03:53")
            ->withDueDate("2023-09-01 05:03:53");

        $delivery = SalesOrderResponse\Delivery::create()
            ->withShippingMethodId(123)
            ->withAddress($address);

        $currency = SalesOrderResponse\Currency::create()
            ->withFixedExchangeRate(true)
            ->withExchangeRate("SomeExchangeRate")
            ->withCode("SomeCode");

        $order = SalesOrderResponse::create()
            ->withId(123)
            ->withCustomer($customer)
            ->withBilling($billing)
            ->withRef("SomeRef")
            ->withPlacedOn("2023-09-01 01:03:53")
            ->withParentId(234)
            ->withStatusId(345)
            ->withWarehouseId(456)
            ->withChannelId(567)
            ->withStaffOwnerId(678)
            ->withProjectId(789)
            ->withLeadSourceId(890)
            ->withTeamId(987)
            ->withPriceListId(876)
            ->withPriceModeCode("SomePriceModeCode")
            ->withDelivery($delivery)
            ->withCurrency($currency)
            ->withRows($rows)
            ->withTotal($total)
            ->withStockStatusCode("SomeStockStatusCode")
            ->withCreatedBy(765)
            ->withCreatedOn("2023-09-01 02:03:53")
            ->withUpdatedOn("2023-09-01 03:03:53")
            ->withInvoice($invoice)
            ->withOrderWeighting(654)
            ->withCostPriceListId(543)
            ->withCustomerId(432)
            ->withTaxDate("2023-09-01 04:03:53");

        self::assertEquals($this->getJsonData(), $order->toJson());
    }

    /**
     * @return void
     */
    public function testGetters()
    {
        $data = $this->getJsonData();
        $order = SalesOrderResponse::fromJson($data);

        self::assertInstanceOf(SalesOrderResponse\Customer::class, $order->getCustomer());
        self::assertEquals(123, $order->getCustomer()->getId());
        self::assertInstanceOf(SalesOrderResponse\Customer\Address::class, $order->getCustomer()->getAddress());
        self::assertEquals("SomeFullName", $order->getCustomer()->getAddress()->getAddressFullName());
        self::assertEquals("SomeCompanyName", $order->getCustomer()->getAddress()->getCompanyName());
        self::assertEquals("SomeAddressLine1", $order->getCustomer()->getAddress()->getAddressLine1());
        self::assertEquals("SomeAddressLine2", $order->getCustomer()->getAddress()->getAddressLine2());
        self::assertEquals("SomeAddressLine3", $order->getCustomer()->getAddress()->getAddressLine3());
        self::assertEquals("SomeAddressLine4", $order->getCustomer()->getAddress()->getAddressLine4());
        self::assertEquals("SomePostalcode", $order->getCustomer()->getAddress()->getPostalcode());
        self::assertEquals("GB", $order->getCustomer()->getAddress()->getCountryIsoCode());
        self::assertEquals("0987654321", $order->getCustomer()->getAddress()->getTelephone());
        self::assertEquals("1234567890", $order->getCustomer()->getAddress()->getMobileTelephone());
        self::assertEquals("example@test.com", $order->getCustomer()->getAddress()->getEmail());
        self::assertEquals("1236547890", $order->getCustomer()->getAddress()->getFax());

        self::assertInstanceOf(SalesOrderResponse\Billing::class, $order->getBilling());
        self::assertEquals(123, $order->getBilling()->getContactId());
        self::assertInstanceOf(SalesOrderResponse\Customer\Address::class, $order->getBilling()->getAddress());
        self::assertEquals("SomeFullName", $order->getBilling()->getAddress()->getAddressFullName());
        self::assertEquals("SomeCompanyName", $order->getBilling()->getAddress()->getCompanyName());
        self::assertEquals("SomeAddressLine1", $order->getBilling()->getAddress()->getAddressLine1());
        self::assertEquals("SomeAddressLine2", $order->getBilling()->getAddress()->getAddressLine2());
        self::assertEquals("SomeAddressLine3", $order->getBilling()->getAddress()->getAddressLine3());
        self::assertEquals("SomeAddressLine4", $order->getBilling()->getAddress()->getAddressLine4());
        self::assertEquals("SomePostalcode", $order->getBilling()->getAddress()->getPostalcode());
        self::assertEquals("GB", $order->getBilling()->getAddress()->getCountryIsoCode());
        self::assertEquals("0987654321", $order->getBilling()->getAddress()->getTelephone());
        self::assertEquals("1234567890", $order->getBilling()->getAddress()->getMobileTelephone());
        self::assertEquals("example@test.com", $order->getBilling()->getAddress()->getEmail());
        self::assertEquals("1236547890", $order->getBilling()->getAddress()->getFax());

        self::assertInstanceOf(SalesOrderResponse\RowCollection::class, $order->getRows());
        $rows = iterator_to_array($order->getRows()->getIterator());
        self::assertInstanceOf(SalesOrderResponse\Row::class, $rows[0]);
        self::assertEquals(123, $rows[0]->getId());
        self::assertEquals(234, $rows[0]->getProductId());
        self::assertEquals("SomeName", $rows[0]->getName());
        self::assertEquals("SomeSku", $rows[0]->getSku());
        self::assertEquals("SomeQuantity", $rows[0]->getQuantity());
        self::assertEquals("SomeTaxCode", $rows[0]->getTaxCode());
        self::assertEquals("SomeTax", $rows[0]->getTax());
        self::assertEquals("SomeNet", $rows[0]->getNet());
        self::assertEquals("SomeNominalCode", $rows[0]->getNominalCode());
        self::assertEquals("SomeProductPrice", $rows[0]->getProductPrice());
        self::assertEquals("SomeDiscountPercentage", $rows[0]->getDiscountPercentage());
        self::assertEquals(345, $rows[0]->getSequence());
        self::assertTrue($rows[0]->getBundleChild());
        self::assertFalse($rows[0]->getBundleParent());
        self::assertEquals(456, $rows[0]->getParentRowId());
        self::assertEquals(567, $rows[0]->getTaxClassId());
        self::assertEquals("SomeTaxCalculator", $rows[0]->getTaxCalculator());
        self::assertEquals(678, $rows[0]->getClonedFromId());
        self::assertInstanceOf(SalesOrderResponse\Row::class, $rows[1]);
        self::assertEquals(321, $rows[1]->getId());
        self::assertEquals(423, $rows[1]->getProductId());
        self::assertEquals("SomeName2", $rows[1]->getName());
        self::assertEquals("SomeSku2", $rows[1]->getSku());
        self::assertEquals("SomeQuantity2", $rows[1]->getQuantity());
        self::assertEquals("SomeTaxCode2", $rows[1]->getTaxCode());
        self::assertEquals("SomeTax2", $rows[1]->getTax());
        self::assertEquals("SomeNet2", $rows[1]->getNet());
        self::assertEquals("SomeNominalCode2", $rows[1]->getNominalCode());
        self::assertEquals("SomeProductPrice2", $rows[1]->getProductPrice());
        self::assertEquals("SomeDiscountPercentage2", $rows[1]->getDiscountPercentage());
        self::assertEquals(543, $rows[1]->getSequence());
        self::assertFalse($rows[1]->getBundleChild());
        self::assertTrue($rows[1]->getBundleParent());
        self::assertEquals(654, $rows[1]->getParentRowId());
        self::assertEquals(765, $rows[1]->getTaxClassId());
        self::assertEquals("SomeTaxCalculator2", $rows[1]->getTaxCalculator());
        self::assertEquals(876, $rows[1]->getClonedFromId());

        self::assertInstanceOf(SalesOrderResponse\Total::class, $order->getTotal());
        self::assertEquals("SomeNet", $order->getTotal()->getNet());
        self::assertEquals("SomeTax", $order->getTotal()->getTax());
        self::assertEquals("SomeGross", $order->getTotal()->getGross());
        self::assertEquals("SomeBaseNet", $order->getTotal()->getBaseNet());
        self::assertEquals("SomeBaseTax", $order->getTotal()->getBaseTax());
        self::assertEquals("SomeBaseGross", $order->getTotal()->getBaseGross());

        self::assertInstanceOf(SalesOrderResponse\Invoice::class, $order->getInvoice());
        self::assertEquals("SomeInvoiceRef", $order->getInvoice()->getInvoiceReference());
        self::assertEquals("2023-09-01 04:03:53", $order->getInvoice()->getTaxDate());
        self::assertEquals("2023-09-01 05:03:53", $order->getInvoice()->getDueDate());

        self::assertInstanceOf(SalesOrderResponse\Delivery::class, $order->getDelivery());
        self::assertEquals(123, $order->getDelivery()->getShippingMethodId());
        self::assertInstanceOf(SalesOrderResponse\Customer\Address::class, $order->getDelivery()->getAddress());
        self::assertEquals("SomeFullName", $order->getDelivery()->getAddress()->getAddressFullName());
        self::assertEquals("SomeCompanyName", $order->getDelivery()->getAddress()->getCompanyName());
        self::assertEquals("SomeAddressLine1", $order->getDelivery()->getAddress()->getAddressLine1());
        self::assertEquals("SomeAddressLine2", $order->getDelivery()->getAddress()->getAddressLine2());
        self::assertEquals("SomeAddressLine3", $order->getDelivery()->getAddress()->getAddressLine3());
        self::assertEquals("SomeAddressLine4", $order->getDelivery()->getAddress()->getAddressLine4());
        self::assertEquals("SomePostalcode", $order->getDelivery()->getAddress()->getPostalcode());
        self::assertEquals("GB", $order->getDelivery()->getAddress()->getCountryIsoCode());
        self::assertEquals("0987654321", $order->getDelivery()->getAddress()->getTelephone());
        self::assertEquals("1234567890", $order->getDelivery()->getAddress()->getMobileTelephone());
        self::assertEquals("example@test.com", $order->getDelivery()->getAddress()->getEmail());
        self::assertEquals("1236547890", $order->getDelivery()->getAddress()->getFax());

        self::assertInstanceOf(SalesOrderResponse\Currency::class, $order->getCurrency());
        self::assertTrue($order->getCurrency()->getFixedExchangeRate());
        self::assertEquals("SomeExchangeRate", $order->getCurrency()->getExchangeRate());
        self::assertEquals("SomeCode", $order->getCurrency()->getCode());

        self::assertInstanceOf(SalesOrderResponse::class, $order);
        self::assertEquals(123, $order->getId());
        self::assertEquals("SomeRef", $order->getRef());
        self::assertEquals("2023-09-01 01:03:53", $order->getPlacedOn());
        self::assertEquals(234, $order->getParentId());
        self::assertEquals(345, $order->getStatusId());
        self::assertEquals(456, $order->getWarehouseId());
        self::assertEquals(567, $order->getChannelId());
        self::assertEquals(678, $order->getStaffOwnerId());
        self::assertEquals(789, $order->getProjectId());
        self::assertEquals(890, $order->getLeadSourceId());
        self::assertEquals(987, $order->getTeamId());
        self::assertEquals(876, $order->getPriceListId());
        self::assertEquals("SomePriceModeCode", $order->getPriceModeCode());
        self::assertEquals("SomeStockStatusCode", $order->getStockStatusCode());
        self::assertEquals(765, $order->getCreatedBy());
        self::assertEquals("2023-09-01 02:03:53", $order->getCreatedOn());
        self::assertEquals("2023-09-01 03:03:53", $order->getUpdatedOn());
        self::assertEquals(654, $order->getOrderWeighting());
        self::assertEquals(543, $order->getCostPriceListId());
        self::assertEquals(432, $order->getCustomerId());
        self::assertEquals("2023-09-01 04:03:53", $order->getTaxDate());
    }

    /**
     * @return void
     */
    public function testEquals()
    {
        $data = $this->getJsonData();
        $salesOrderResponse1 = SalesOrderResponse::fromJson($data);
        $salesOrderResponse2 = SalesOrderResponse::fromJson($data);
        self::assertTrue($salesOrderResponse1->equals($salesOrderResponse2));
    }
}