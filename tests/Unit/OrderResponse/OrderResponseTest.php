<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\OrderResponse;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\OrderResponse;
use SnowIO\BrightpearlDataModel\OrderResponse\Parties;

class OrderResponseTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            'id' => 123,
            'parentOrderId' => 234,
            'orderTypeCode' => "SomeCode",
            'orderStatus' => [
                'orderStatusId' => 123,
                'name' => "SomeOrderStatusName"
            ],
            'orderRows' => [
                [
                    'orderRowSequence' => "SomeOrderRowSequence",
                    'productId' => 123,
                    'productName' => "SomeProductName",
                    'productSku' => "SomeProductSku",
                    'quantity' => [
                        'magnitude' => "SomeMagnitude"
                    ],
                    'itemCost' => [
                        'currencyCode' => "GBP",
                        'value' => "199.99"
                    ],
                    'productPrice' => [
                        'currencyCode' => "USD",
                        'value' => "299.99"
                    ],
                    'discountPercentage' => "SomeDiscountPercentage",
                    'rowValue' => [
                        'taxRate' => "14%",
                        'taxCode' => "SomeTaxCode",
                        'taxCalculator' => "SomeTaxCalculator",
                        'rowNet' => [
                            'currencyCode' => "GBP",
                            'value' => "499.99"
                        ],
                        'rowTax' => [
                            'currencyCode' => "USD",
                            'value' => "599.99"
                        ],
                        'taxClassId' => 345
                    ],
                    'nominalCode' => "SomeNominalCode",
                    'composition' => [
                        'bundleParent' => true,
                        'bundleChild' => false,
                        'parentOrderRowId' => 456
                    ],
                    'externalRef' => "SomeExternalRef",
                    'clonedFromId' => 234
                ],
                [
                    'orderRowSequence' => "SomeOrderRowSequence2",
                    'productId' => 1232,
                    'productName' => "SomeProductName2",
                    'productSku' => "SomeProductSku2",
                    'quantity' => [
                        'magnitude' => "SomeMagnitude2"
                    ],
                    'itemCost' => [
                        'currencyCode' => "GBP2",
                        'value' => "2199.99"
                    ],
                    'productPrice' => [
                        'currencyCode' => "USD2",
                        'value' => "2299.99"
                    ],
                    'discountPercentage' => "SomeDiscountPercentage2",
                    'rowValue' => [
                        'taxRate' => "12%",
                        'taxCode' => "SomeTaxCode2",
                        'taxCalculator' => "SomeTaxCalculator2",
                        'rowNet' => [
                            'currencyCode' => "GBP2",
                            'value' => "2499.99"
                        ],
                        'rowTax' => [
                            'currencyCode' => "USD2",
                            'value' => "2599.99"
                        ],
                        'taxClassId' => 3452
                    ],
                    'nominalCode' => "SomeNominalCode2",
                    'composition' => [
                        'bundleParent' => false,
                        'bundleChild' => true,
                        'parentOrderRowId' => 4562
                    ],
                    'externalRef' => "SomeExternalRef2",
                    'clonedFromId' => 2342
                ]
            ],
            'externalRef' => "SomeExtRef",
            'reference' => "SomeRef",
            'state' => [
                'tax' => "SomeTaxValue"
            ],
            'orderPaymentStatus' => "processing",
            'stockStatusCode' => "in stock",
            'allocationStatusCode' => "warehouse",
            'shippingStatusCode' => "picking",
            'placedOn' => "2023-09-01 16:03:53",
            'createdOn' => "2023-09-01 17:03:53",
            'updatedOn' => "2023-09-01 18:03:53",
            'createdById' => "SomeCreatedById",
            'priceListId' => "SomePriceListId",
            'priceModeCode' => "SomePriceModeCode",
            'delivery' => [
                'deliveryDate' => "2023-09-01 19:03:53",
                'shippingMethodId' => 123
            ],
            'invoices' => [
                [
                    'invoiceReference' => "SomeInvoiceRef",
                    'taxDate' => "2023-09-01 20:03:53",
                    'dueDate' => "2023-09-01 21:03:53"
                ],
                [
                    'invoiceReference' => "SomeInvoiceRef2",
                    'taxDate' => "2023-09-01 22:03:53",
                    'dueDate' => "2023-09-01 23:03:53"
                ]
            ],
            'totalValue' => [
                'net' => "1.99",
                'taxAmount' => "2.99",
                'baseNet' => "3.99",
                'baseTaxAmount' => "4.99",
                'baseTotal' => "5.99",
                'total' => "6.99"
            ],
            'parties' => [
                    "supplier" => [
                        'contactId' => 345,
                        'addressFullName' => "SomeAddressFullName2",
                        'companyName' => "SomeCompanyName2",
                        'addressLine1' => "SomeAddressLine12",
                        'addressLine2' => "SomeAddressLine22",
                        'addressLine3' => "SomeAddressLine32",
                        'addressLine4' => "SomeAddressLine42",
                        'postalCode' => "SomePostalCode2",
                        'country' => "SomeCountry2",
                        'telephone' => "SomeTelephone2",
                        'mobileTelephone' => "SomeMobileTelephone2",
                        'fax' => "SomeFax2",
                        'email' => "some2@exmaple.com",
                        'countryId' => 456,
                        'countryIsoCode' => "SomeCountryIsoCode2",
                        'countryIsoCode3' => "SomeCountryIsoCode32",
                    ],
                    "delivery" => [
                        'addressFullName' => "SomeAddressFullName",
                        'companyName' => "SomeCompanyName",
                        'addressLine1' => "SomeAddressLine1",
                        'addressLine2' => "SomeAddressLine2",
                        'addressLine3' => "SomeAddressLine3",
                        'addressLine4' => "SomeAddressLine4",
                        'postalCode' => "SomePostalCode",
                        'country' => "SomeCountry",
                        'telephone' => "SomeTelephone",
                        'mobileTelephone' => "SomeMobileTelephone",
                        'fax' => "SomeFax",
                        'email' => "some@exmaple.com",
                        'countryId' => 234,
                        'countryIsoCode' => "SomeCountryIsoCode",
                        'countryIsoCode3' => "SomeCountryIsoCode3",
                    ],
                    "billing" => [
                        'contactId' => 345,
                        'addressFullName' => "SomeAddressFullName2",
                        'companyName' => "SomeCompanyName2",
                        'addressLine1' => "SomeAddressLine12",
                        'addressLine2' => "SomeAddressLine22",
                        'addressLine3' => "SomeAddressLine32",
                        'addressLine4' => "SomeAddressLine42",
                        'postalCode' => "SomePostalCode2",
                        'country' => "SomeCountry2",
                        'telephone' => "SomeTelephone2",
                        'mobileTelephone' => "SomeMobileTelephone2",
                        'fax' => "SomeFax2",
                        'email' => "some2@exmaple.com",
                        'countryId' => 456,
                        'countryIsoCode' => "SomeCountryIsoCode2",
                        'countryIsoCode3' => "SomeCountryIsoCode32",
                    ]
                ],
                'warehouseId' => 345,
                'acknowledged' => 456,
                'costPriceListId' => 567,
                'historicalOrder' => true,
                'isDropship' => false,
                'orderWeighting' => 678
            ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $order = OrderResponse::fromJson($data);
        self::assertEquals($data, $order->toJson());
    }

    public function testWithers()
    {
        $orderStatus = OrderResponse\OrderStatus::create()
            ->withOrderStatusId(123)
            ->withName("SomeOrderStatusName");

        $row1Quantity = OrderResponse\Row\Quantity::create()
            ->withMagnitude("SomeMagnitude");
        $row1ItemCost = OrderResponse\Row\Amount::create()
            ->withValue("199.99")
            ->withCurrencyCode("GBP");
        $row1ProductPrice = OrderResponse\Row\Amount::create()
            ->withValue("299.99")
            ->withCurrencyCode("USD");
        $row1RowValueRowNet = OrderResponse\Row\Amount::create()
            ->withValue("499.99")
            ->withCurrencyCode("GBP");
        $row1RowValueRowTax = OrderResponse\Row\Amount::create()
            ->withValue("599.99")
            ->withCurrencyCode("USD");
        $row1RowValue = OrderResponse\Row\RowValue::create()
            ->withTaxCode("SomeTaxCode")
            ->withRowNet($row1RowValueRowNet)
            ->withRowTax($row1RowValueRowTax)
            ->withTaxCalculator("SomeTaxCalculator")
            ->withTaxRate("14%")
            ->withTaxClassId(345);
        $row1Composition = OrderResponse\Row\Composition::create()
            ->withBundleChild(false)
            ->withBundleParent(true)
            ->withParentOrderRowId(456);
        $row1 = OrderResponse\Row::create()
            ->withOrderRowSequence("SomeOrderRowSequence")
            ->withProductId(123)
            ->withProductName("SomeProductName")
            ->withProductSku("SomeProductSku")
            ->withQuantity($row1Quantity)
            ->withItemCost($row1ItemCost)
            ->withProductPrice($row1ProductPrice)
            ->withDiscountPercentage("SomeDiscountPercentage")
            ->withRowValue($row1RowValue)
            ->withNominalCode("SomeNominalCode")
            ->withComposition($row1Composition)
            ->withExternalRef("SomeExternalRef")
            ->withClonedFromId(234);

        $row2Quantity = OrderResponse\Row\Quantity::create()
            ->withMagnitude("SomeMagnitude2");
        $row2ItemCost = OrderResponse\Row\Amount::create()
            ->withValue("2199.99")
            ->withCurrencyCode("GBP2");
        $row2ProductPrice = OrderResponse\Row\Amount::create()
            ->withValue("2299.99")
            ->withCurrencyCode("USD2");
        $row2RowValueRowNet = OrderResponse\Row\Amount::create()
            ->withValue("2499.99")
            ->withCurrencyCode("GBP2");
        $row2RowValueRowTax = OrderResponse\Row\Amount::create()
            ->withValue("2599.99")
            ->withCurrencyCode("USD2");
        $row2RowValue = OrderResponse\Row\RowValue::create()
            ->withTaxCode("SomeTaxCode2")
            ->withRowNet($row2RowValueRowNet)
            ->withRowTax($row2RowValueRowTax)
            ->withTaxCalculator("SomeTaxCalculator2")
            ->withTaxRate("12%")
            ->withTaxClassId(3452);
        $row2Composition = OrderResponse\Row\Composition::create()
            ->withBundleChild(true)
            ->withBundleParent(false)
            ->withParentOrderRowId(4562);
        $row2 = OrderResponse\Row::create()
            ->withOrderRowSequence("SomeOrderRowSequence2")
            ->withProductId(1232)
            ->withProductName("SomeProductName2")
            ->withProductSku("SomeProductSku2")
            ->withQuantity($row2Quantity)
            ->withItemCost($row2ItemCost)
            ->withProductPrice($row2ProductPrice)
            ->withDiscountPercentage("SomeDiscountPercentage2")
            ->withRowValue($row2RowValue)
            ->withNominalCode("SomeNominalCode2")
            ->withComposition($row2Composition)
            ->withExternalRef("SomeExternalRef2")
            ->withClonedFromId(2342);

        $orderRows = OrderResponse\RowCollection::of([$row1, $row2]);

        $state = OrderResponse\State::create()
            ->withTax("SomeTaxValue");

        $delivery = OrderResponse\Delivery::create()
            ->withDeliveryDate("2023-09-01 19:03:53")
            ->withShippingMethodId(123);

        $invoice1 = OrderResponse\Invoice::create()
            ->withInvoiceReference("SomeInvoiceRef")
            ->withTaxDate("2023-09-01 20:03:53")
            ->withDueDate("2023-09-01 21:03:53");
        $invoice2 = OrderResponse\Invoice::create()
            ->withInvoiceReference("SomeInvoiceRef2")
            ->withTaxDate("2023-09-01 22:03:53")
            ->withDueDate("2023-09-01 23:03:53");
        $invoices = OrderResponse\InvoiceCollection::of([$invoice1, $invoice2]);

        $totalValue = OrderResponse\TotalValue::create()
            ->withNet("1.99")
            ->withTaxAmount("2.99")
            ->withBaseNet("3.99")
            ->withBaseTaxAmount("4.99")
            ->withBaseTotal("5.99")
            ->withTotal("6.99");

        $partiesSupplier = OrderResponse\Parties\Supplier::create()
            ->withContactId(345)
            ->withAddressFullName("SomeAddressFullName2")
            ->withCompanyName("SomeCompanyName2")
            ->withAddressLine1("SomeAddressLine12")
            ->withAddressLine2("SomeAddressLine22")
            ->withAddressLine3("SomeAddressLine32")
            ->withAddressLine4("SomeAddressLine42")
            ->withPostalCode("SomePostalCode2")
            ->withCountry("SomeCountry2")
            ->withTelephone("SomeTelephone2")
            ->withMobileTelephone("SomeMobileTelephone2")
            ->withFax("SomeFax2")
            ->withEmail("some2@exmaple.com")
            ->withCountryId(456)
            ->withCountryIsoCode("SomeCountryIsoCode2")
            ->withCountryIsoCode3("SomeCountryIsoCode32");

        $partiesDelivery = OrderResponse\Parties\Delivery::create()
            ->withAddressFullName("SomeAddressFullName")
            ->withCompanyName("SomeCompanyName")
            ->withAddressLine1("SomeAddressLine1")
            ->withAddressLine2("SomeAddressLine2")
            ->withAddressLine3("SomeAddressLine3")
            ->withAddressLine4("SomeAddressLine4")
            ->withPostalCode("SomePostalCode")
            ->withCountry("SomeCountry")
            ->withTelephone("SomeTelephone")
            ->withMobileTelephone("SomeMobileTelephone")
            ->withFax("SomeFax")
            ->withEmail("some@exmaple.com")
            ->withCountryId(234)
            ->withCountryIsoCode("SomeCountryIsoCode")
            ->withCountryIsoCode3("SomeCountryIsoCode3");

        $partiesBilling = OrderResponse\Parties\Billing::create()
            ->withContactId(345)
            ->withAddressFullName("SomeAddressFullName2")
            ->withCompanyName("SomeCompanyName2")
            ->withAddressLine1("SomeAddressLine12")
            ->withAddressLine2("SomeAddressLine22")
            ->withAddressLine3("SomeAddressLine32")
            ->withAddressLine4("SomeAddressLine42")
            ->withPostalCode("SomePostalCode2")
            ->withCountry("SomeCountry2")
            ->withTelephone("SomeTelephone2")
            ->withMobileTelephone("SomeMobileTelephone2")
            ->withFax("SomeFax2")
            ->withEmail("some2@exmaple.com")
            ->withCountryId(456)
            ->withCountryIsoCode("SomeCountryIsoCode2")
            ->withCountryIsoCode3("SomeCountryIsoCode32");

        $parties = OrderResponse\Parties::create()
            ->withSupplier($partiesSupplier)
            ->withDelivery($partiesDelivery)
            ->withBilling($partiesBilling);

        $orderResponse = OrderResponse::create()
            ->withId(123)
            ->withParentOrderId(234)
            ->withOrderTypeCode("SomeCode")
            ->withOrderStatus($orderStatus)
            ->withOrderRows($orderRows)
            ->withExternalRef("SomeExtRef")
            ->withReference("SomeRef")
            ->withState($state)
            ->withOrderPaymentStatus("processing")
            ->withStockStatusCode("in stock")
            ->withAllocationStatusCode("warehouse")
            ->withShippingStatusCode("picking")
            ->withPlacedOn("2023-09-01 16:03:53")
            ->withCreatedOn("2023-09-01 17:03:53")
            ->withUpdatedOn("2023-09-01 18:03:53")
            ->withCreatedById("SomeCreatedById")
            ->withPriceListId("SomePriceListId")
            ->withPriceModeCode("SomePriceModeCode")
            ->withDelivery($delivery)
            ->withInvoices($invoices)
            ->withTotalValue($totalValue)
            ->withParties($parties)
            ->withWarehouseId(345)
            ->withAcknowledged(456)
            ->withCostPriceListId(567)
            ->withHistoricalOrder(true)
            ->withIsDropship(false)
            ->withOrderWeighting(678);

        self::assertEquals($this->getJsonData(), $orderResponse->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $order = OrderResponse::fromJson($data);

        self::assertInstanceOf(OrderResponse\OrderStatus::class, $order->getOrderStatus());
        self::assertEquals(123, $order->getOrderStatus()->getOrderStatusId());
        self::assertEquals("SomeOrderStatusName", $order->getOrderStatus()->getName());

        self::assertInstanceOf(OrderResponse\RowCollection::class, $order->getOrderRows());
        $rows = iterator_to_array($order->getOrderRows()->getIterator());
        self::assertInstanceOf(OrderResponse\Row::class, $rows[0]);
        self::assertInstanceOf(OrderResponse\Row::class, $rows[1]);

        self::assertEquals("SomeOrderRowSequence", $rows[0]->getOrderRowSequence());
        self::assertEquals(123, $rows[0]->getProductId());
        self::assertEquals("SomeProductName", $rows[0]->getProductName());
        self::assertEquals("SomeProductSku", $rows[0]->getProductSku());
        self::assertEquals("SomeDiscountPercentage", $rows[0]->getDiscountPercentage());
        self::assertEquals("SomeNominalCode", $rows[0]->getNominalCode());
        self::assertEquals("SomeExternalRef", $rows[0]->getExternalRef());
        self::assertEquals(234, $rows[0]->getClonedFromId());
        self::assertInstanceOf(OrderResponse\Row\Quantity::class, $rows[0]->getQuantity());
        self::assertEquals("SomeMagnitude", $rows[0]->getQuantity()->getMagnitude());
        self::assertInstanceOf(OrderResponse\Row\Amount::class, $rows[0]->getItemCost());
        self::assertEquals("GBP", $rows[0]->getItemCost()->getCurrencyCode());
        self::assertEquals("199.99", $rows[0]->getItemCost()->getValue());
        self::assertInstanceOf(OrderResponse\Row\Amount::class, $rows[0]->getProductPrice());
        self::assertEquals("USD", $rows[0]->getProductPrice()->getCurrencyCode());
        self::assertEquals("299.99", $rows[0]->getProductPrice()->getValue());
        self::assertInstanceOf(OrderResponse\Row\RowValue::class, $rows[0]->getRowValue());
        self::assertEquals("14%", $rows[0]->getRowValue()->getTaxRate());
        self::assertEquals("SomeTaxCode", $rows[0]->getRowValue()->getTaxCode());
        self::assertEquals("SomeTaxCalculator", $rows[0]->getRowValue()->getTaxCalculator());
        self::assertEquals(345, $rows[0]->getRowValue()->getTaxClassId());
        self::assertInstanceOf(OrderResponse\Row\Amount::class, $rows[0]->getRowValue()->getRowNet());
        self::assertEquals("GBP", $rows[0]->getRowValue()->getRowNet()->getCurrencyCode());
        self::assertEquals("499.99", $rows[0]->getRowValue()->getRowNet()->getValue());
        self::assertInstanceOf(OrderResponse\Row\Amount::class, $rows[0]->getRowValue()->getRowTax());
        self::assertEquals("USD", $rows[0]->getRowValue()->getRowTax()->getCurrencyCode());
        self::assertEquals("599.99", $rows[0]->getRowValue()->getRowTax()->getValue());
        self::assertInstanceOf(OrderResponse\Row\Composition::class, $rows[0]->getComposition());
        self::assertTrue($rows[0]->getComposition()->isBundleParent());
        self::assertFalse($rows[0]->getComposition()->isBundleChild());
        self::assertEquals(456, $rows[0]->getComposition()->getParentOrderRowId());

        self::assertEquals("SomeOrderRowSequence2", $rows[1]->getOrderRowSequence());
        self::assertEquals(1232, $rows[1]->getProductId());
        self::assertEquals("SomeProductName2", $rows[1]->getProductName());
        self::assertEquals("SomeProductSku2", $rows[1]->getProductSku());
        self::assertEquals("SomeDiscountPercentage2", $rows[1]->getDiscountPercentage());
        self::assertEquals("SomeNominalCode2", $rows[1]->getNominalCode());
        self::assertEquals("SomeExternalRef2", $rows[1]->getExternalRef());
        self::assertEquals(2342, $rows[1]->getClonedFromId());
        self::assertInstanceOf(OrderResponse\Row\Quantity::class, $rows[1]->getQuantity());
        self::assertEquals("SomeMagnitude2", $rows[1]->getQuantity()->getMagnitude());
        self::assertInstanceOf(OrderResponse\Row\Amount::class, $rows[1]->getItemCost());
        self::assertEquals("GBP2", $rows[1]->getItemCost()->getCurrencyCode());
        self::assertEquals("2199.99", $rows[1]->getItemCost()->getValue());
        self::assertInstanceOf(OrderResponse\Row\Amount::class, $rows[1]->getProductPrice());
        self::assertEquals("USD2", $rows[1]->getProductPrice()->getCurrencyCode());
        self::assertEquals("2299.99", $rows[1]->getProductPrice()->getValue());
        self::assertInstanceOf(OrderResponse\Row\RowValue::class, $rows[1]->getRowValue());
        self::assertEquals("12%", $rows[1]->getRowValue()->getTaxRate());
        self::assertEquals("SomeTaxCode2", $rows[1]->getRowValue()->getTaxCode());
        self::assertEquals("SomeTaxCalculator2", $rows[1]->getRowValue()->getTaxCalculator());
        self::assertEquals(3452, $rows[1]->getRowValue()->getTaxClassId());
        self::assertInstanceOf(OrderResponse\Row\Amount::class, $rows[1]->getRowValue()->getRowNet());
        self::assertEquals("GBP2", $rows[1]->getRowValue()->getRowNet()->getCurrencyCode());
        self::assertEquals("2499.99", $rows[1]->getRowValue()->getRowNet()->getValue());
        self::assertInstanceOf(OrderResponse\Row\Amount::class, $rows[1]->getRowValue()->getRowTax());
        self::assertEquals("USD2", $rows[1]->getRowValue()->getRowTax()->getCurrencyCode());
        self::assertEquals("2599.99", $rows[1]->getRowValue()->getRowTax()->getValue());
        self::assertInstanceOf(OrderResponse\Row\Composition::class, $rows[1]->getComposition());
        self::assertFalse($rows[1]->getComposition()->isBundleParent());
        self::assertTrue($rows[1]->getComposition()->isBundleChild());
        self::assertEquals(4562, $rows[1]->getComposition()->getParentOrderRowId());

        self::assertInstanceOf(OrderResponse\Delivery::class, $order->getDelivery());
        self::assertEquals("2023-09-01 19:03:53", $order->getDelivery()->getDeliveryDate());
        self::assertEquals(123, $order->getDelivery()->getShippingMethodId());

        self::assertInstanceOf(OrderResponse\InvoiceCollection::class, $order->getInvoices());
        $invoices = iterator_to_array($order->getInvoices()->getIterator());
        self::assertInstanceOf(OrderResponse\Invoice::class, $invoices[0]);
        self::assertInstanceOf(OrderResponse\Invoice::class, $invoices[1]);
        self::assertEquals("SomeInvoiceRef", $invoices[0]->getInvoiceReference());
        self::assertEquals("2023-09-01 20:03:53", $invoices[0]->getTaxDate());
        self::assertEquals("2023-09-01 21:03:53", $invoices[0]->getDueDate());
        self::assertEquals("SomeInvoiceRef2", $invoices[1]->getInvoiceReference());
        self::assertEquals("2023-09-01 22:03:53", $invoices[1]->getTaxDate());
        self::assertEquals("2023-09-01 23:03:53", $invoices[1]->getDueDate());

        self::assertInstanceOf(OrderResponse\TotalValue::class, $order->getTotalValue());
        self::assertEquals("1.99", $order->getTotalValue()->getNet());
        self::assertEquals("2.99", $order->getTotalValue()->getTaxAmount());
        self::assertEquals("3.99", $order->getTotalValue()->getBaseNet());
        self::assertEquals("4.99", $order->getTotalValue()->getBaseTaxAmount());
        self::assertEquals("5.99", $order->getTotalValue()->getBaseTotal());
        self::assertEquals("6.99", $order->getTotalValue()->getTotal());

        self::assertInstanceOf(OrderResponse\Parties::class, $order->getParties());
        self::assertInstanceOf(OrderResponse\Parties\Supplier::class, $order->getParties()->getSupplier());
        self::assertInstanceOf(OrderResponse\Parties\Delivery::class, $order->getParties()->getDelivery());
        self::assertInstanceOf(OrderResponse\Parties\Billing::class, $order->getParties()->getBilling());

        self::assertEquals(345, $order->getParties()->getSupplier()->getContactId());
        self::assertEquals('SomeAddressFullName2', $order->getParties()->getSupplier()->getAddressFullName());
        self::assertEquals('SomeCompanyName2', $order->getParties()->getSupplier()->getCompanyName());
        self::assertEquals('SomeAddressLine12', $order->getParties()->getSupplier()->getAddressLine1());
        self::assertEquals('SomeAddressLine22', $order->getParties()->getSupplier()->getAddressLine2());
        self::assertEquals('SomeAddressLine32', $order->getParties()->getSupplier()->getAddressLine3());
        self::assertEquals('SomeAddressLine42', $order->getParties()->getSupplier()->getAddressLine4());
        self::assertEquals('SomePostalCode2', $order->getParties()->getSupplier()->getPostalCode());
        self::assertEquals('SomeCountry2', $order->getParties()->getSupplier()->getCountry());
        self::assertEquals('SomeTelephone2', $order->getParties()->getSupplier()->getTelephone());
        self::assertEquals('SomeMobileTelephone2', $order->getParties()->getSupplier()->getMobileTelephone());
        self::assertEquals('SomeFax2', $order->getParties()->getSupplier()->getFax());
        self::assertEquals('some2@exmaple.com', $order->getParties()->getSupplier()->getEmail());
        self::assertEquals(456, $order->getParties()->getSupplier()->getCountryId());
        self::assertEquals('SomeCountryIsoCode2', $order->getParties()->getSupplier()->getCountryIsoCode());
        self::assertEquals('SomeCountryIsoCode32', $order->getParties()->getSupplier()->getCountryIsoCode3());

        self::assertEquals('SomeAddressFullName', $order->getParties()->getDelivery()->getAddressFullName());
        self::assertEquals('SomeCompanyName', $order->getParties()->getDelivery()->getCompanyName());
        self::assertEquals('SomeAddressLine1', $order->getParties()->getDelivery()->getAddressLine1());
        self::assertEquals('SomeAddressLine2', $order->getParties()->getDelivery()->getAddressLine2());
        self::assertEquals('SomeAddressLine3', $order->getParties()->getDelivery()->getAddressLine3());
        self::assertEquals('SomeAddressLine4', $order->getParties()->getDelivery()->getAddressLine4());
        self::assertEquals('SomePostalCode', $order->getParties()->getDelivery()->getPostalCode());
        self::assertEquals('SomeCountry', $order->getParties()->getDelivery()->getCountry());
        self::assertEquals('SomeTelephone', $order->getParties()->getDelivery()->getTelephone());
        self::assertEquals('SomeMobileTelephone', $order->getParties()->getDelivery()->getMobileTelephone());
        self::assertEquals('SomeFax', $order->getParties()->getDelivery()->getFax());
        self::assertEquals('some@exmaple.com', $order->getParties()->getDelivery()->getEmail());
        self::assertEquals(234, $order->getParties()->getDelivery()->getCountryId());
        self::assertEquals('SomeCountryIsoCode',$order->getParties()->getDelivery()->getCountryIsoCode());
        self::assertEquals('SomeCountryIsoCode3', $order->getParties()->getDelivery()->getCountryIsoCode3());

        self::assertEquals(345, $order->getParties()->getBilling()->getContactId());
        self::assertEquals('SomeAddressFullName2', $order->getParties()->getBilling()->getAddressFullName());
        self::assertEquals('SomeCompanyName2', $order->getParties()->getBilling()->getCompanyName());
        self::assertEquals('SomeAddressLine12', $order->getParties()->getBilling()->getAddressLine1());
        self::assertEquals('SomeAddressLine22', $order->getParties()->getBilling()->getAddressLine2());
        self::assertEquals('SomeAddressLine32', $order->getParties()->getBilling()->getAddressLine3());
        self::assertEquals('SomeAddressLine42', $order->getParties()->getBilling()->getAddressLine4());
        self::assertEquals('SomePostalCode2', $order->getParties()->getBilling()->getPostalCode());
        self::assertEquals('SomeCountry2', $order->getParties()->getBilling()->getCountry());
        self::assertEquals('SomeTelephone2', $order->getParties()->getBilling()->getTelephone());
        self::assertEquals('SomeMobileTelephone2', $order->getParties()->getBilling()->getMobileTelephone());
        self::assertEquals('SomeFax2', $order->getParties()->getBilling()->getFax());
        self::assertEquals('some2@exmaple.com', $order->getParties()->getBilling()->getEmail());
        self::assertEquals(456, $order->getParties()->getBilling()->getCountryId());
        self::assertEquals('SomeCountryIsoCode2',$order->getParties()->getBilling()->getCountryIsoCode());
        self::assertEquals('SomeCountryIsoCode32', $order->getParties()->getBilling()->getCountryIsoCode3());

        self::assertInstanceOf(OrderResponse\State::class, $order->getState());
        self::assertEquals("SomeTaxValue", $order->getState()->getTax());

        self::assertEquals(123, $order->getId());
        self::assertEquals(234, $order->getParentOrderId());
        self::assertEquals("SomeCode", $order->getOrderTypeCode());
        self::assertEquals("SomeExtRef", $order->getExternalRef());
        self::assertEquals("SomeRef", $order->getReference());
        self::assertEquals("processing", $order->getOrderPaymentStatus());
        self::assertEquals("in stock", $order->getStockStatusCode());
        self::assertEquals("warehouse", $order->getAllocationStatusCode());
        self::assertEquals("picking", $order->getShippingStatusCode());
        self::assertEquals("2023-09-01 16:03:53", $order->getPlacedOn());
        self::assertEquals("2023-09-01 17:03:53", $order->getCreatedOn());
        self::assertEquals("2023-09-01 18:03:53", $order->getUpdatedOn());
        self::assertEquals("SomeCreatedById", $order->getCreatedById());
        self::assertEquals("SomePriceListId", $order->getPriceListId());
        self::assertEquals("SomePriceModeCode", $order->getPriceModeCode());
        self::assertEquals(345, $order->getWarehouseId());
        self::assertEquals(456, $order->getAcknowledged());
        self::assertEquals(567, $order->getCostPriceListId());
        self::assertEquals(678, $order->getHistoricalOrder());
        self::assertFalse($order->getIsDropship());
        self::assertTrue($order->getHistoricalOrder());
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $orderResponse1 = OrderResponse::fromJson($data);
        $orderResponse2 = OrderResponse::fromJson($data);
        self::assertTrue($orderResponse1->equals($orderResponse2));
    }
}
