<?php

namespace SnowIO\BrightpearlDataModel\Test\Unit\Product;

use PHPUnit\Framework\TestCase;
use SnowIO\BrightpearlDataModel\Product;

class ProductTest extends TestCase
{
    private function getJsonData(): array
    {
        return [
            'id' => 123,
            'brandId' => 234,
            'productTypeId' => 345,
            'identity' => [
                'sku' => "ABC",
                'isbn' => "BCD",
                'ean' => "CDE",
                'upc' => "DEF",
                'mpn' => "EFG",
                'barcode' => "FGH"
            ],
            'featured' => true,
            'stock' => [
                'stockTracked' => false,
                'weight' => [
                    'magnitude' => 2.0
                ],
                'dimensions' => [
                    'length' => 1.10,
                    'height' => 1.20,
                    'width' => 1.30,
                    'volume' => 1.40,
                ]
            ],
            'financialDetails' => [
                'taxable' => true,
                'taxCode' => [
                    'id' => 111,
                    'code' => "ABC123",
                ]
            ],
            'salesChannels' => [
                [
                    'salesChannelName' => "Sales channel 1",
                    'productName' => "Some product 1",
                    'productCondition' => "new",
                    'categories' => [
                        [
                            'categoryCode' => "Cat1"
                        ],
                        [
                            'categoryCode' => "Cat2"
                        ],
                    ],
                    'description' => [
                        'languageCode' => "en",
                        'text' => "This is a description",
                        'format' => "utf-8",
                    ],
                    'shortDescription' => [
                        'languageCode' => "fr",
                        'text' => "This is a short description",
                        'format' => "utf-16",
                    ]
                ],
                [
                    'salesChannelName' => "Sales channel 2",
                    'productName' => "Some product 2",
                    'productCondition' => "old",
                    'categories' => [
                        [
                            'categoryCode' => "Cat2"
                        ],
                        [
                            'categoryCode' => "Cat3"
                        ],
                    ],
                    'description' => [
                        'languageCode' => "en 2",
                        'text' => "This is a description 2",
                        'format' => "utf-8",
                    ],
                    'shortDescription' => [
                        'languageCode' => "fr 2",
                        'text' => "This is a short description 2",
                        'format' => "utf-16",
                    ]
                ]
            ],
            'composition' => [
                'bundle' => true,
                'bundleComponents' => [
                    [
                        'productId' => 1122,
                        'productQuantity' => 10,
                        'sku' => "SomeBundleSku1"
                    ],
                    [
                        'productId' => 2233,
                        'productQuantity' => 11,
                        'sku' => "SomeBundleSku2"
                    ]
                ]
            ],
            'variations' => [
                [
                    'optionId' => 11,
                    'optionName' => "Some option 1",
                    'optionValueId' => 22,
                    'optionValue' => "Some option value 1"
                ],
                [
                    'optionId' => 33,
                    'optionName' => "Some option 2",
                    'optionValueId' => 44,
                    'optionValue' => "Some option value 2"
                ]
            ],
            'createdOn' => "2023-09-01 16:03:53",
            'updatedOn' => "2023-09-02 16:03:53",
            'warehouses' => [
                'defaultLocationId' => 111,
                'reorderLevel' => 222,
                'reorderQuantity' => 333
            ],
            'nominalCodeStock' => "111",
            'nominalCodePurchases' => "11",
            'nominalCodeSales' => "1",
            'seasonIds' => [
                '123',
                '234',
                '456'
            ],
            'reporting' => [
                'categoryId' => 123,
                'subCategoryId' => 234,
                'seasonId' => 345
            ],
            'status' => "ready",
            'salesPopupMessage' => "On sale",
            'warehousePopupMessage' => "Warehouse sale",
            'version' => 456,
            'customFields' => [
                "custom field 1",
                "custom field 2",
                "custom field 3",
            ]
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData();
        $product = Product::fromJson($data);
        self::assertEquals($data, $product->toJson());
    }

    public function testWithers()
    {
        $identity = Product\Identity::create()
            ->withSku("ABC")
            ->withIsbn("BCD")
            ->withEan("CDE")
            ->withUpc("DEF")
            ->withMpn("EFG")
            ->withBarcode("FGH");

        $weight = Product\Stock\Weight::create()
            ->withMagnitude(2.0);

        $dimensions = Product\Stock\Dimensions::create()
            ->withLength(1.10)
            ->withHeight(1.20)
            ->withWidth(1.30)
            ->withVolume(1.40);

        $stock = Product\Stock::create()
            ->withStockTracked(false)
            ->withWeight($weight)
            ->withDimensions($dimensions);

        $taxCode = Product\FinancialDetails\TaxCode::create()
            ->withId(111)
            ->withCode("ABC123");

        $financialDetails = Product\FinancialDetails::create()
            ->withTaxable(true)
            ->withTaxCode($taxCode);

        $cat1 = Product\SalesChannel\Category::create()
            ->withCategoryCode("Cat1");
        $cat2 = Product\SalesChannel\Category::create()
            ->withCategoryCode("Cat2");
        $cat3 = Product\SalesChannel\Category::create()
            ->withCategoryCode("Cat3");

        $desc1 = Product\SalesChannel\Description::create()
            ->withLanguageCode("en")
            ->withText("This is a description")
            ->withFormat("utf-8");
        $shortDesc1 = Product\SalesChannel\Description::create()
            ->withLanguageCode("fr")
            ->withText("This is a short description")
            ->withFormat("utf-16");
        $desc2 = Product\SalesChannel\Description::create()
            ->withLanguageCode("en 2")
            ->withText("This is a description 2")
            ->withFormat("utf-8");
        $shortDesc2 = Product\SalesChannel\Description::create()
            ->withLanguageCode("fr 2")
            ->withText("This is a short description 2")
            ->withFormat("utf-16");

        $salesChannel1 = Product\SalesChannel::create()
            ->withSalesChannelName("Sales channel 1")
            ->withProductName("Some product 1")
            ->withProductCondition("new")
            ->withCategories([$cat1, $cat2])
            ->withDescription($desc1)
            ->withShortDescription($shortDesc1);

        $salesChannel2 = Product\SalesChannel::create()
            ->withSalesChannelName("Sales channel 2")
            ->withProductName("Some product 2")
            ->withProductCondition("old")
            ->withCategories([$cat2, $cat3])
            ->withDescription($desc2)
            ->withShortDescription($shortDesc2);

        $bundleComponent1 = Product\Composition\BundleComponent::create()
            ->withSku("SomeBundleSku1")
            ->withProductId(1122)
            ->withProductQuantity(10);
        $bundleComponent2 = Product\Composition\BundleComponent::create()
            ->withSku("SomeBundleSku2")
            ->withProductId(2233)
            ->withProductQuantity(11);

        $composition = Product\Composition::create()
            ->withBundle(true)
            ->withBundleComponents([$bundleComponent1, $bundleComponent2]);

        $variation1 = Product\Variation::create()
            ->withOptionId(11)
            ->withOptionName("Some option 1")
            ->withOptionValueId(22)
            ->withOptionValue("Some option value 1");
        $variation2 = Product\Variation::create()
            ->withOptionId(33)
            ->withOptionName("Some option 2")
            ->withOptionValueId(44)
            ->withOptionValue("Some option value 2");

        $warehouses = Product\Warehouses::create()
            ->withDefaultLocationId(111)
            ->withReorderLevel(222)
            ->withReorderQuantity(333);

        $reporting = Product\Reporting::create()
            ->withCategoryId(123)
            ->withSubCategoryId(234)
            ->withSeasonId(345);

        $product = Product::create()
            ->withId(123)
            ->withBrandId(234)
            ->withProductTypeId(345)
            ->withIdentity($identity)
            ->withFeatured(true)
            ->withStock($stock)
            ->withFinancialDetails($financialDetails)
            ->withSalesChannels([$salesChannel1, $salesChannel2])
            ->withComposition($composition)
            ->withVariations([$variation1, $variation2])
            ->withCreatedOn("2023-09-01 16:03:53")
            ->withUpdatedOn("2023-09-02 16:03:53")
            ->withWarehouses($warehouses)
            ->withNominalCodeStock("111")
            ->withNominalCodePurchases("11")
            ->withNominalCodeSales("1")
            ->withSeasonIds(['123', '234', '456'])
            ->withReporting($reporting)
            ->withStatus("ready")
            ->withSalesPopupMessage("On sale")
            ->withWarehousePopupMessage("Warehouse sale")
            ->withVersion(456)
            ->withCustomFields(["custom field 1", "custom field 2", "custom field 3",]);

        self::assertEquals($this->getJsonData(), $product->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData();
        $product = Product::fromJson($data);

        self::assertEquals(123, $product->getId());
        self::assertEquals(234, $product->getBrandId());
        self::assertEquals(345, $product->getProductTypeId());

        self::assertInstanceOf(Product\Identity::class, $product->getIdentity());
        self::assertEquals("ABC", $product->getIdentity()->getSku());
        self::assertEquals("BCD", $product->getIdentity()->getIsbn());
        self::assertEquals("CDE", $product->getIdentity()->getEan());
        self::assertEquals("DEF", $product->getIdentity()->getUpc());
        self::assertEquals("EFG", $product->getIdentity()->getMpn());
        self::assertEquals("FGH", $product->getIdentity()->getBarcode());

        self::assertTrue($product->isFeatured());

        self::assertInstanceOf(Product\Stock::class, $product->getStock());
        self::assertFalse($product->getStock()->isStockTracked());
        self::assertInstanceOf(Product\Stock\Weight::class, $product->getStock()->getWeight());
        self::assertEquals(2.0, $product->getStock()->getWeight()->getMagnitude());
        self::assertInstanceOf(Product\Stock\Dimensions::class, $product->getStock()->getDimensions());
        self::assertEquals(1.10, $product->getStock()->getDimensions()->getLength());
        self::assertEquals(1.20, $product->getStock()->getDimensions()->getHeight());
        self::assertEquals(1.30, $product->getStock()->getDimensions()->getWidth());
        self::assertEquals(1.40, $product->getStock()->getDimensions()->getVolume());

        self::assertInstanceOf(Product\FinancialDetails::class, $product->getFinancialDetails());
        self::assertTrue($product->getFinancialDetails()->isTaxable());
        self::assertInstanceOf(Product\FinancialDetails\TaxCode::class, $product->getFinancialDetails()->getTaxCode());
        self::assertEquals(111, $product->getFinancialDetails()->getTaxCode()->getId());
        self::assertEquals("ABC123", $product->getFinancialDetails()->getTaxCode()->getCode());

        self::assertIsArray($product->getSalesChannels());
        self::assertInstanceOf(Product\SalesChannel::class, $product->getSalesChannels()[0]);
        self::assertEquals("Sales channel 1", $product->getSalesChannels()[0]->getSalesChannelName());
        self::assertEquals("Some product 1", $product->getSalesChannels()[0]->getProductName());
        self::assertEquals("new", $product->getSalesChannels()[0]->getProductCondition());
        self::assertIsArray($product->getSalesChannels()[0]->getCategories());
        self::assertInstanceOf(Product\SalesChannel\Category::class, $product->getSalesChannels()[0]->getCategories()[0]);
        self::assertEquals("Cat1", $product->getSalesChannels()[0]->getCategories()[0]->getCategoryCode());
        self::assertInstanceOf(Product\SalesChannel\Category::class, $product->getSalesChannels()[0]->getCategories()[1]);
        self::assertEquals("Cat2", $product->getSalesChannels()[0]->getCategories()[1]->getCategoryCode());
        self::assertInstanceOf(Product\SalesChannel\Description::class, $product->getSalesChannels()[0]->getDescription());
        self::assertEquals("en", $product->getSalesChannels()[0]->getDescription()->getLanguageCode());
        self::assertEquals("This is a description", $product->getSalesChannels()[0]->getDescription()->getText());
        self::assertEquals("utf-8", $product->getSalesChannels()[0]->getDescription()->getFormat());
        self::assertInstanceOf(Product\SalesChannel\Description::class, $product->getSalesChannels()[0]->getShortDescription());
        self::assertEquals("fr", $product->getSalesChannels()[0]->getShortDescription()->getLanguageCode());
        self::assertEquals("This is a short description", $product->getSalesChannels()[0]->getShortDescription()->getText());
        self::assertEquals("utf-16", $product->getSalesChannels()[0]->getShortDescription()->getFormat());

        self::assertInstanceOf(Product\SalesChannel::class, $product->getSalesChannels()[1]);
        self::assertEquals("Sales channel 2", $product->getSalesChannels()[1]->getSalesChannelName());
        self::assertEquals("Some product 2", $product->getSalesChannels()[1]->getProductName());
        self::assertEquals("old", $product->getSalesChannels()[1]->getProductCondition());
        self::assertIsArray($product->getSalesChannels()[1]->getCategories());
        self::assertInstanceOf(Product\SalesChannel\Category::class, $product->getSalesChannels()[1]->getCategories()[1]);
        self::assertEquals("Cat2", $product->getSalesChannels()[1]->getCategories()[0]->getCategoryCode());
        self::assertInstanceOf(Product\SalesChannel\Category::class, $product->getSalesChannels()[1]->getCategories()[1]);
        self::assertEquals("Cat3", $product->getSalesChannels()[1]->getCategories()[1]->getCategoryCode());
        self::assertInstanceOf(Product\SalesChannel\Description::class, $product->getSalesChannels()[1]->getDescription());
        self::assertEquals("en 2", $product->getSalesChannels()[1]->getDescription()->getLanguageCode());
        self::assertEquals("This is a description 2", $product->getSalesChannels()[1]->getDescription()->getText());
        self::assertEquals("utf-8", $product->getSalesChannels()[1]->getDescription()->getFormat());
        self::assertInstanceOf(Product\SalesChannel\Description::class, $product->getSalesChannels()[1]->getShortDescription());
        self::assertEquals("fr 2", $product->getSalesChannels()[1]->getShortDescription()->getLanguageCode());
        self::assertEquals("This is a short description 2", $product->getSalesChannels()[1]->getShortDescription()->getText());
        self::assertEquals("utf-16", $product->getSalesChannels()[1]->getShortDescription()->getFormat());

        self::assertInstanceOf(Product\Composition::class, $product->getComposition());
        self::assertTrue($product->getComposition()->isBundle());
        self::assertIsArray($product->getComposition()->getBundleComponents());
        self::assertInstanceOf(Product\Composition\BundleComponent::class, $product->getComposition()->getBundleComponents()[0]);
        self::assertEquals(1122, $product->getComposition()->getBundleComponents()[0]->getProductId());
        self::assertEquals(10, $product->getComposition()->getBundleComponents()[0]->getProductQuantity());
        self::assertEquals("SomeBundleSku1", $product->getComposition()->getBundleComponents()[0]->getSku());
        self::assertInstanceOf(Product\Composition\BundleComponent::class, $product->getComposition()->getBundleComponents()[1]);
        self::assertEquals(2233, $product->getComposition()->getBundleComponents()[1]->getProductId());
        self::assertEquals(11, $product->getComposition()->getBundleComponents()[1]->getProductQuantity());
        self::assertEquals("SomeBundleSku2", $product->getComposition()->getBundleComponents()[1]->getSku());

        self::assertIsArray($product->getVariations());
        self::assertInstanceOf(Product\Variation::class, $product->getVariations()[0]);
        self::assertEquals(11, $product->getVariations()[0]->getOptionId());
        self::assertEquals("Some option 1", $product->getVariations()[0]->getOptionName());
        self::assertEquals(22, $product->getVariations()[0]->getOptionValueId());
        self::assertEquals("Some option value 1", $product->getVariations()[0]->getOptionValue());
        self::assertInstanceOf(Product\Variation::class, $product->getVariations()[1]);
        self::assertEquals(33, $product->getVariations()[1]->getOptionId());
        self::assertEquals("Some option 2", $product->getVariations()[1]->getOptionName());
        self::assertEquals(44, $product->getVariations()[1]->getOptionValueId());
        self::assertEquals("Some option value 2", $product->getVariations()[1]->getOptionValue());

        self::assertEquals("2023-09-01 16:03:53", $product->getCreatedOn());
        self::assertEquals("2023-09-02 16:03:53", $product->getUpdatedOn());

        self::assertInstanceOf(Product\Warehouses::class, $product->getWarehouses());
        self::assertEquals(111, $product->getWarehouses()->getDefaultLocationId());
        self::assertEquals(222, $product->getWarehouses()->getReorderLevel());
        self::assertEquals(333, $product->getWarehouses()->getReorderQuantity());

        self::assertEquals("111", $product->getNominalCodeStock());
        self::assertEquals("11", $product->getNominalCodePurchases());
        self::assertEquals("1", $product->getNominalCodeSales());
        self::assertEquals(['123', '234', '456'], $product->getSeasonIds());

        self::assertInstanceOf(Product\Reporting::class, $product->getReporting());
        self::assertEquals(123, $product->getReporting()->getCategoryId());
        self::assertEquals(234, $product->getReporting()->getSubCategoryId());
        self::assertEquals(345, $product->getReporting()->getSeasonId());

        self::assertEquals("ready", $product->getStatus());
        self::assertEquals("On sale", $product->getSalesPopupMessage());
        self::assertEquals("Warehouse sale", $product->getWarehousePopupMessage());
        self::assertEquals(456, $product->getVersion());
        self::assertEquals(["custom field 1", "custom field 2", "custom field 3"], $product->getCustomFields());
    }

    public function testEquals()
    {
        $data = $this->getJsonData();
        $product1 = Product::fromJson($data);
        $product2 = Product::fromJson($data);
        self::assertTrue($product1->equals($product2));

        $product1 = Product::fromJson($data);
        $product2 = Product::fromJson($data)->withId(1);
        self::assertFalse($product1->equals($product2));
    }
}
