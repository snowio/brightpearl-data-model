<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\SalesCredit;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\SalesCredit;
use SnowIO\BrightpearlDataModel\SalesCredit\Currency;
use SnowIO\BrightpearlDataModel\SalesCredit\Delivery;
use SnowIO\BrightpearlDataModel\SalesCredit\Delivery\Address;
use SnowIO\BrightpearlDataModel\SalesCredit\RowCollection;
use SnowIO\BrightpearlDataModel\SalesCredit\RowCollection\Row;

class SalesCreditTest extends TestCase
{
    /**
     * @return array<string, mixed>
     */
    private function getJsonData(): array
    {
        return [
            'customerId' => 12345,
            'ref' => "ref",
            'placedOn' => "20/20/2000",
            'taxDate' => "16/03/2023",
            'parentId' => 67,
            'statusId' => 89,
            'warehouseId' => 910,
            'staffOwnerId' => 1112,
            'projectId' => 1314,
            'channelId' => 1516,
            'externalRef' => "ex-ref",
            'installedIntegrationInstanceId' => 1718,
            'leadSourceId' => 1920,
            'teamId' => 2122,
            'priceListId' => 2324,
            'priceModeCode' => "2526",
            'currency' => [
                "fixedExchangeRate" => true,
                "exchangeRate" => "1.5",
                "code" => "2728"
            ],
            'delivery' => [
                'date' => "20/20/2000",
                'shippingMethodId' => 1,
                'address' => [
                    'addressFullName' => '123 Street',
                    'companyName' => 'ampersand',
                    'addressLine1' => '123 Street',
                    'addressLine2' => "Manchester",
                    'addressLine3' => "Manchester area",
                    'addressLine4' => "earth",
                    'postcode' => "M44",
                    'countryIsoCode' => "M1",
                    'telephone' => "0771",
                    'mobileTelephone' => "0772",
                    'email' => "ampersand@test.com",
                ]
            ],
            'rows' => [
                [
                    'productId' => 1,
                    'name' => "p1",
                    'quantity' => "q-1",
                    'taxCode' => "tax-1",
                    'net' => "net-1",
                    'tax' => "tax-1",
                    'nominalCode' => "code-1",
                    'externalRef' => "ref-1"
                ],
                [
                    'productId' => 2,
                    'name' => "p2",
                    'quantity' => "q-2",
                    'taxCode' => "tax-2",
                    'net' => "net-2",
                    'tax' => "tax-2",
                    'nominalCode' => "code-2",
                    'externalRef' => "ref-2"
                ]
            ]
        ];
    }

    /**
     * @return void
     */
    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $salesCredit = SalesCredit::fromJson($data);
        self::assertEquals($data, $salesCredit->toJson());
    }

    /**
     * @return void
     */
    public function testWithers()
    {
        $currency = Currency::create()
            ->withFixedExchangeRate(true)
            ->withExchangeRate("1.5")
            ->withCode("2728");


        $address = Address::create()
            ->withAddressFullName("123 Street")
            ->withCompanyName("ampersand")
            ->withAddressLine1("123 Street")
            ->withAddressLine2("Manchester")
            ->withAddressLine3("Manchester area")
            ->withAddressLine4("earth")
            ->withPostalCode("M44")
            ->withCountryIsoCode("M1")
            ->withTelephone("0771")
            ->withMobileTelephone("0772")
            ->withEmail("ampersand@test.com");

        $delivery = Delivery::create()
            ->withDate("20/20/2000")
            ->withShippingMethodId(1)
            ->withAddress($address);


        $row1 = Row::create()
            ->withProductId(1)
            ->withName("p1")
            ->withQuantity("q-1")
            ->withTaxCode("tax-1")
            ->withNet("net-1")
            ->withTax("tax-1")
            ->withNominalCode("code-1")
            ->withExternalRef("ref-1");

        $row2 = Row::create()
            ->withProductId(2)
            ->withName("p2")
            ->withQuantity("q-2")
            ->withTaxCode("tax-2")
            ->withNet("net-2")
            ->withTax("tax-2")
            ->withNominalCode("code-2")
            ->withExternalRef("ref-2");

        $rowCollection = RowCollection::create()->of([$row1, $row2]);

        $salesCredit = SalesCredit::create()
            ->withCustomerId(12345)
            ->withRef("ref")
            ->withPlacedOn("20/20/2000")
            ->withTaxDate("16/03/2023")
            ->withParentId(67)
            ->withStatusId(89)
            ->withWarehouseId(910)
            ->withStaffOwnerId(1112)
            ->withProjectId(1314)
            ->withChannelId(1516)
            ->withExternalRef("ex-ref")
            ->withInstalledIntegrationInstanceId(1718)
            ->withLeadSourceId(1920)
            ->withTeamId(2122)
            ->withPriceListId(2324)
            ->withPriceModeCode("2526")
            ->withCurrency($currency)
            ->withDelivery($delivery)
            ->withRows($rowCollection);

        self::assertEquals($this->getJsonData(), $salesCredit->toJson());
    }

    /**
     * @return void
     */
    public function testGetters()
    {
        $data = $this->getJsonData();
        $salesCredit = SalesCredit::fromJson($data);
        self::assertEquals(12345, $salesCredit->getCustomerId());
        self::assertEquals("ref", $salesCredit->getRef());
        self::assertEquals("20/20/2000", $salesCredit->getPlacedOn());
        self::assertEquals("16/03/2023", $salesCredit->getTaxDate());
        self::assertEquals(67, $salesCredit->getParentId());
        self::assertEquals(89, $salesCredit->getStatusId());
        self::assertEquals(910, $salesCredit->getWarehouseId());
        self::assertEquals(1112, $salesCredit->getStaffOwnerId());
        self::assertEquals(1314, $salesCredit->getProjectId());
        self::assertEquals(1516, $salesCredit->getChannelId());
        self::assertEquals("ex-ref", $salesCredit->getExternalRef());
        self::assertEquals(1718, $salesCredit->getInstalledIntegrationInstanceId());
        self::assertEquals(1920, $salesCredit->getLeadSourceId());
        self::assertEquals(2122, $salesCredit->getTeamId());
        self::assertEquals(2324, $salesCredit->getPriceListId());
        self::assertEquals("2526", $salesCredit->getPriceModeCode());
        self::assertInstanceOf(Currency::class, $salesCredit->getCurrency());
        self::assertTrue(true, $salesCredit->getCurrency()->getFixedExchangeRate());
        self::assertEquals("1.5", $salesCredit->getCurrency()->getExchangeRate());
        self::assertEquals("2728", $salesCredit->getCurrency()->getCode());
        self::assertInstanceOf(Delivery::class, $salesCredit->getDelivery());
        self::assertEquals("20/20/2000", $salesCredit->getDelivery()->getDate());
        self::assertEquals(1, $salesCredit->getDelivery()->getShippingMethodId());
        self::assertInstanceOf(Address::class, $salesCredit->getDelivery()->getAddress());
        self::assertEquals("123 Street", $salesCredit->getDelivery()->getAddress()->getAddressFullName());
        self::assertEquals("ampersand", $salesCredit->getDelivery()->getAddress()->getCompanyName());
        self::assertEquals("123 Street", $salesCredit->getDelivery()->getAddress()->getAddressLine1());
        self::assertEquals("Manchester", $salesCredit->getDelivery()->getAddress()->getAddressLine2());
        self::assertEquals("Manchester area", $salesCredit->getDelivery()->getAddress()->getAddressLine3());
        self::assertEquals("earth", $salesCredit->getDelivery()->getAddress()->getAddressLine4());
        self::assertEquals("M44", $salesCredit->getDelivery()->getAddress()->getPostalCode());
        self::assertEquals("M1", $salesCredit->getDelivery()->getAddress()->getCountryIsoCode());
        self::assertEquals("0771", $salesCredit->getDelivery()->getAddress()->getTelephone());
        self::assertEquals("0772", $salesCredit->getDelivery()->getAddress()->getMobileTelephone());
        self::assertEquals("ampersand@test.com", $salesCredit->getDelivery()->getAddress()->getEmail());

        self::assertInstanceOf(RowCollection::class, $salesCredit->getRows());
        $salesCreditRow = iterator_to_array($salesCredit->getRows()->getIterator());
        self::assertInstanceOf(Row::class, $salesCreditRow[0]);
        self::assertInstanceOf(Row::class, $salesCreditRow[1]);
        self::assertEquals(1, $salesCreditRow[0]->getProductId());
        self::assertEquals("p1", $salesCreditRow[0]->getName());
        self::assertEquals("q-1", $salesCreditRow[0]->getQuantity());
        self::assertEquals("tax-1", $salesCreditRow[0]->getTaxCode());
        self::assertEquals("net-1", $salesCreditRow[0]->getNet());
        self::assertEquals("tax-1", $salesCreditRow[0]->getTax());
        self::assertEquals("code-1", $salesCreditRow[0]->getNominalCode());
        self::assertEquals("ref-1", $salesCreditRow[0]->getExternalRef());
        self::assertEquals(2, $salesCreditRow[1]->getProductId());
        self::assertEquals("p2", $salesCreditRow[1]->getName());
        self::assertEquals("q-2", $salesCreditRow[1]->getQuantity());
        self::assertEquals("tax-2", $salesCreditRow[1]->getTaxCode());
        self::assertEquals("net-2", $salesCreditRow[1]->getNet());
        self::assertEquals("tax-2", $salesCreditRow[1]->getTax());
        self::assertEquals("code-2", $salesCreditRow[1]->getNominalCode());
        self::assertEquals("ref-2", $salesCreditRow[1]->getExternalRef());
    }

    /**
     * @return void
     */
    public function testEquals()
    {
        $data = $this->getJsonData();
        $salesCredit1 = SalesCredit::fromJson($data);
        $salesCredit2 = SalesCredit::fromJson($data);
        self::assertTrue($salesCredit1->equals($salesCredit2));
    }
}
