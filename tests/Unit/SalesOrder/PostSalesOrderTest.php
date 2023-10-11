<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\SalesOrder;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Order;
use SnowIO\BrightpearlDataModel\SalesOrder;
use SnowIO\BrightpearlDataModel\SalesOrder\PostSalesOrder;
use SnowIO\BrightpearlDataModel\Test\Unit\DirectoryAwareTestTrait;

class PostSalesOrderTest extends TestCase
{
    use DirectoryAwareTestTrait;

    public function testFromJsonToJson()
    {
        $json = $this->getFromTestFileDirectory('SalesOrder/post-sales-order.json');
        $salesOrder = PostSalesOrder::fromJson($json);
        self::assertEquals($json, $salesOrder->toJson());
    }

    public function testWithers()
    {
        $address1 = SalesOrder\Address::create()
            ->withAddressFullName("Snow avenue")
            ->withCompanyName("Snow")
            ->withAddressLine1("some street")
            ->withAddressLine2("some area")
            ->withAddressLine3("some town")
            ->withAddressLine4("some city")
            ->withPostalCode("AB12 ABC")
            ->withCountryIsoCode("GBR")
            ->withTelephone("1234567890")
            ->withMobileTelephone('1234567890')
            ->withFax('1234567890')
            ->withEmail("test@domain.com");

        $address2 = SalesOrder\Address::create()
            ->withAddressFullName("John Doe")
            ->withCompanyName("BrightPearl")
            ->withAddressLine1("First floor")
            ->withAddressLine2("New Bond House")
            ->withAddressLine3("Bristol")
            ->withAddressLine4("near Cabot Circus")
            ->withPostalCode("BS2 9AG")
            ->withCountryIsoCode("GBR")
            ->withTelephone("01234 567890")
            ->withMobileTelephone('070707070707')
            ->withFax('0707070707072')
            ->withEmail("john.doe@brightpearl.com");

        $row1 = SalesOrder\Row::create()
            ->withProductId(123456)
            ->withName("Product Example 1")
            ->withQuantity("123")
            ->withTaxCode("ABC")
            ->withNet("100")
            ->withTax("14")
            ->withNominalCode("ABCDEF")
            ->withExternalRef("FEDCBA");

        $row2 = SalesOrder\Row::create()
            ->withProductId(456789)
            ->withName("Product Example 2")
            ->withQuantity("456")
            ->withTaxCode("DEF")
            ->withNet("101")
            ->withTax("15")
            ->withNominalCode("ABCDEF2")
            ->withExternalRef("FEDCBA2");

        $order = PostSalesOrder::create()
            ->withCustomer(SalesOrder\Customer::create()
                ->withId(123))
            ->withBilling(SalesOrder\Billing::create()
                ->withContactId(234)
                ->withAddress($address1))
            ->withRef("ABC123XYZ890")
            ->withTaxDate("2023-09-01")
            ->withWarehouseId(567)
            ->withStaffOwnerId(6)
            ->withProjectId(1)
            ->withChannelId(1)
            ->withExternalRef("hsdf74-2js7-jdsfi38-73jsd8")
            ->withInstalledIntegrationInstanceId(3)
            ->withLeadSourceId(4)
            ->withTeamId(987)
            ->withPriceListId(2)
            ->withPriceModeCode("SOMECODE")
            ->withCurrency(SalesOrder\Currency::create()
                ->withCode("GBP")
                ->withFixedExchangeRate(true)
                ->withExchangeRate("1"))
            ->withDelivery(SalesOrder\Delivery::create()
                ->withDate("2016-09-29T11:12:24.000+01:00")
                ->withAddress($address2)
                ->withShippingMethodId(6))
            ->withRows(SalesOrder\RowCollection::of([
                $row1, $row2
            ]));

        $json = $this->getFromTestFileDirectory('SalesOrder/post-sales-order.json');
        self::assertEquals($json, $order->toJson());
    }

    /**
     * @return void
     */
    public function testGetters()
    {
        $data = $this->getFromTestFileDirectory('SalesOrder/post-sales-order.json');
        $order = PostSalesOrder::fromJson($data);

        self::assertInstanceOf(SalesOrder\Customer::class, $order->getCustomer());
        self::assertEquals(123, $order->getCustomer()->getId());

        self::assertInstanceOf(SalesOrder\Billing::class, $order->getBilling());
        self::assertEquals(234, $order->getBilling()->getContactId());
        self::assertInstanceOf(SalesOrder\Address::class, $order->getBilling()->getAddress());
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
        self::assertEquals(567, $order->getWarehouseId());
        self::assertEquals(6, $order->getStaffOwnerId());
        self::assertEquals(1, $order->getProjectId());
        self::assertEquals(1, $order->getChannelId());
        self::assertEquals("hsdf74-2js7-jdsfi38-73jsd8", $order->getExternalRef());
        self::assertEquals(3, $order->getInstalledIntegrationInstanceId());
        self::assertEquals(4, $order->getLeadSourceId());
        self::assertEquals(987, $order->getTeamId());
        self::assertEquals(2, $order->getPriceListId());
        self::assertEquals("SOMECODE", $order->getPriceModeCode());

        self::assertInstanceOf(SalesOrder\Currency::class, $order->getCurrency());
        self::assertEquals("GBP", $order->getCurrency()->getCode());
        self::assertTrue($order->getCurrency()->getFixedExchangeRate());
        self::assertEquals("1", $order->getCurrency()->getExchangeRate());

        self::assertInstanceOf(SalesOrder\Delivery::class, $order->getDelivery());
        self::assertEquals("2016-09-29T11:12:24.000+01:00", $order->getDelivery()->getDate());
        self::assertEquals(6, $order->getDelivery()->getShippingMethodId());
        self::assertInstanceOf(SalesOrder\Address::class, $order->getDelivery()->getAddress());
        self::assertEquals("John Doe", $order->getDelivery()->getAddress()->getAddressFullName());
        self::assertEquals("BrightPearl", $order->getDelivery()->getAddress()->getCompanyName());
        self::assertEquals("First floor", $order->getDelivery()->getAddress()->getAddressLine1());
        self::assertEquals("New Bond House", $order->getDelivery()->getAddress()->getAddressLine2());
        self::assertEquals("Bristol", $order->getDelivery()->getAddress()->getAddressLine3());
        self::assertEquals("near Cabot Circus", $order->getDelivery()->getAddress()->getAddressLine4());
        self::assertEquals("BS2 9AG", $order->getDelivery()->getAddress()->getPostalCode());
        self::assertEquals("GBR", $order->getDelivery()->getAddress()->getCountryIsoCode());
        self::assertEquals("01234 567890", $order->getDelivery()->getAddress()->getTelephone());
        self::assertEquals("john.doe@brightpearl.com", $order->getDelivery()->getAddress()->getEmail());

        self::assertInstanceOf(SalesOrder\RowCollection::class, $order->getRows());
        $rows = iterator_to_array($order->getRows()->getIterator());
        self::assertInstanceOf(SalesOrder\Row::class, $rows[0]);
        self::assertEquals(123456, $rows[0]->getProductId());
        self::assertEquals("Product Example 1", $rows[0]->getName());
        self::assertEquals("123", $rows[0]->getQuantity());
        self::assertEquals("ABC", $rows[0]->getTaxCode());
        self::assertEquals("100", $rows[0]->getNet());
        self::assertEquals("14", $rows[0]->getTax());
        self::assertEquals("ABCDEF", $rows[0]->getNominalCode());
        self::assertEquals("FEDCBA", $rows[0]->getExternalRef());

        self::assertInstanceOf(SalesOrder\Row::class, $rows[1]);
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
        $data = $this->getFromTestFileDirectory('SalesOrder/post-sales-order.json');
        $order1 = PostSalesOrder::fromJson($data);
        $order2 = PostSalesOrder::fromJson($data);
        self::assertTrue($order1->equals($order2));
    }
}
