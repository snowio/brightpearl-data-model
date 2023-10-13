<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\Product\Composition;
use SnowIO\BrightpearlDataModel\Product\FinancialDetails;
use SnowIO\BrightpearlDataModel\Product\Identity;
use SnowIO\BrightpearlDataModel\Product\Reporting;
use SnowIO\BrightpearlDataModel\Product\SalesChannel;
use SnowIO\BrightpearlDataModel\Product\Stock;
use SnowIO\BrightpearlDataModel\Product\Variation;
use SnowIO\BrightpearlDataModel\Product\Warehouses;

class Product implements ModelInterface
{
    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->id = $json['id'] ?? null;
        $result->brandId = $json['brandId'] ?? null;
        $result->productTypeId = $json['productTypeId'] ?? null;
        $result->identity = Identity::fromJson($json['identity'] ?? []);
        $result->featured = $json['featured'] ?? false;
        $result->stock = Stock::fromJson($json['stock'] ?? []);
        $result->financialDetails = FinancialDetails::fromJson($json['financialDetails'] ?? []);
        $result->composition = Composition::fromJson($json['composition'] ?? []);
        $result->createdOn = $json['createdOn'] ?? null;
        $result->updatedOn = $json['updatedOn'] ?? null;
        $result->warehouses = Warehouses::fromJson($json['warehouses'] ?? []);
        $result->nominalCodeStock = $json['nominalCodeStock'] ?? null;
        $result->nominalCodePurchases = $json['nominalCodePurchases'] ?? null;
        $result->nominalCodeSales = $json['nominalCodeSales'] ?? null;
        $result->seasonIds = $json['seasonIds'] ?? [];
        $result->reporting = Reporting::fromJson($json['reporting'] ?? []);
        $result->status = $json['status'] ?? null;
        $result->salesPopupMessage = $json['salesPopupMessage'] ?? null;
        $result->warehousePopupMessage = $json['warehousePopupMessage'] ?? null;
        $result->version = $json['version'] ?? null;
        $result->customFields = $json['customFields'] ?? [];

        $salesChannels = $json['salesChannels'] ?? [];
        foreach ($salesChannels as $salesChannel) {
            $salesChannel = is_array($salesChannel) ? $salesChannel : [];
            $result->salesChannels[] = SalesChannel::fromJson($salesChannel);
        }

        $variations = $json['variations'] ?? [];
        foreach ($variations as $variation) {
            $variation = is_array($variation) ? $variation : [];
            $result->variations[] = Variation::fromJson($variation);
        }

        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'brandId' => $this->getBrandId(),
            'productTypeId' => $this->getProductTypeId(),
            'identity' => $this->getIdentity()->toJson(),
            'featured' => $this->isFeatured(),
            'stock' => $this->getStock()->toJson(),
            'financialDetails' => $this->getFinancialDetails()->toJson(),
            'salesChannels' => array_map(function ($salesChannel) {
                return $salesChannel->toJson();
            }, $this->getSalesChannels()),
            'composition' => $this->getComposition()->toJson(),
            'variations' => array_map(function ($variation) {
                return $variation->toJson();
            }, $this->getVariations()),
            'createdOn' => $this->getCreatedOn(),
            'updatedOn' => $this->getUpdatedOn(),
            'warehouses' => $this->getWarehouses()->toJson(),
            'nominalCodeStock' => $this->getNominalCodeStock(),
            'nominalCodePurchases' => $this->getNominalCodePurchases(),
            'nominalCodeSales' => $this->getNominalCodeSales(),
            'seasonIds' => $this->getSeasonIds(),
            'reporting' => $this->getReporting()->toJson(),
            'status' => $this->getStatus(),
            'salesPopupMessage' => $this->getSalesPopupMessage(),
            'warehousePopupMessage' => $this->getWarehousePopupMessage(),
            'version' => $this->getVersion(),
            'customFields' => $this->getCustomFields()
        ];
    }

    public function equals($other): bool
    {
        return ($other instanceof Product) &&
            ($this->id === $other->id) &&
            ($this->brandId === $other->brandId) &&
            ($this->productTypeId === $other->productTypeId) &&
            ($this->identity->equals($other->identity)) &&
            ($this->featured === $other->featured) &&
            ($this->stock->equals($other->stock)) &&
            ($this->financialDetails->equals($other->financialDetails)) &&
            ($this->salesChannels == $other->salesChannels) && // not strict for array
            ($this->composition->equals($other->composition)) &&
            ($this->variations == $other->variations) && // not strict for array
            ($this->createdOn === $other->createdOn) &&
            ($this->updatedOn === $other->updatedOn) &&
            ($this->warehouses->equals($other->warehouses))&& // not strict for array
            ($this->nominalCodeStock === $other->nominalCodeStock) &&
            ($this->nominalCodePurchases === $other->nominalCodePurchases) &&
            ($this->nominalCodeSales === $other->nominalCodeSales) &&
            ($this->seasonIds === $other->seasonIds) &&
            ($this->reporting->equals($other->reporting)) &&
            ($this->status === $other->status) &&
            ($this->salesPopupMessage === $other->salesPopupMessage) &&
            ($this->warehousePopupMessage === $other->warehousePopupMessage) &&
            ($this->version === $other->version) &&
            ($this->customFields === $other->customFields);
    }

    const DATETIME_FORMAT = "Y-m-d\TH:i:s.BP";
    const LANG_FORMAT_PLAINTEXT = "PLAINTEXT";
    const LANG_FORMAT_HTML_FRAGMENT = "HTML_FRAGMENT";
    const LANG_FORMAT_HTML = "HTML_DOCUMENT";

    /** @var int|null $id */
    private $id;
    /** @var int|null $brandId */
    private $brandId;
    /** @var int|null $productTypeId */
    private $productTypeId;
    /** @var Identity|null $identity */
    private $identity;
    /** @var bool|null $featured */
    private $featured;
    /** @var Stock|null $stock */
    private $stock;
    /** @var FinancialDetails|null $financialDetails */
    private $financialDetails;
    /** @var SalesChannel[] $salesChannels */
    private $salesChannels = [];
    /** @var Composition|null $composition */
    private $composition;
    /** @var Variation[] $variations */
    private $variations = [];
    /** @var string|null $createdOn */
    private $createdOn;
    /** @var string|null $updatedOn */
    private $updatedOn;
    /** @var Warehouses|null $warehouses */
    private $warehouses;
    /** @var string|null $nominalCodeStock */
    private $nominalCodeStock;
    /** @var string|null $nominalCodePurchases */
    private $nominalCodePurchases;
    /** @var string|null $nominalCodeSales */
    private $nominalCodeSales;
    /** @var mixed[] $seasonIds */
    private $seasonIds = [];
    /** @var Reporting|null $reporting */
    private $reporting;
    /** @var string|null $status */
    private $status;
    /** @var string|null $salesPopupMessage */
    private $salesPopupMessage;
    /** @var string|null $warehousePopupMessage */
    private $warehousePopupMessage;
    /** @var int|null $version */
    private $version;
    /** @var mixed[] $customFields */
    private $customFields = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function withId(int $id): Product
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    public function withBrandId(int $brandId): Product
    {
        $clone = clone $this;
        $clone->brandId = $brandId;
        return $clone;
    }

    public function getProductTypeId(): ?int
    {
        return $this->productTypeId;
    }

    public function withProductTypeId(int $productTypeId): Product
    {
        $clone = clone $this;
        $clone->productTypeId = $productTypeId;
        return $clone;
    }

    public function getIdentity(): ?Identity
    {
        return $this->identity;
    }

    public function withIdentity(Identity $identity): Product
    {
        $clone = clone $this;
        $clone->identity = $identity;
        return $clone;
    }

    public function isFeatured(): ?bool
    {
        return $this->featured;
    }

    public function withFeatured(bool $featured): Product
    {
        $clone = clone $this;
        $clone->featured = $featured;
        return $clone;
    }

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function withStock(Stock $stock): Product
    {
        $clone = clone $this;
        $clone->stock = $stock;
        return $clone;
    }

    public function getFinancialDetails(): ?FinancialDetails
    {
        return $this->financialDetails;
    }

    public function withFinancialDetails(FinancialDetails $financialDetails): Product
    {
        $clone = clone $this;
        $clone->financialDetails = $financialDetails;
        return $clone;
    }

    public function getSalesChannels(): array
    {
        return $this->salesChannels;
    }

    public function withSalesChannels(array $salesChannels): Product
    {
        $clone = clone $this;
        $clone->salesChannels = $salesChannels;
        return $clone;
    }

    public function getComposition(): ?Composition
    {
        return $this->composition;
    }

    public function withComposition(Composition $composition): Product
    {
        $clone = clone $this;
        $clone->composition = $composition;
        return $clone;
    }

    public function getVariations(): array
    {
        return $this->variations;
    }

    public function withVariations(array $variations): Product
    {
        $clone = clone $this;
        $clone->variations = $variations;
        return $clone;
    }

    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    public function withCreatedOn(string $createdOn): Product
    {
        $clone = clone $this;
        $clone->createdOn = $createdOn;
        return $clone;
    }

    public function getUpdatedOn(): ?string
    {
        return $this->updatedOn;
    }

    public function withUpdatedOn(string $updatedOn): Product
    {
        $clone = clone $this;
        $clone->updatedOn = $updatedOn;
        return $clone;
    }

    public function getWarehouses(): ?Warehouses
    {
        return $this->warehouses;
    }

    public function withWarehouses(?Warehouses $warehouses): Product
    {
        $clone = clone $this;
        $clone->warehouses = $warehouses;
        return $clone;
    }

    public function getNominalCodeStock(): ?string
    {
        return $this->nominalCodeStock;
    }

    public function withNominalCodeStock(string $nominalCodeStock): Product
    {
        $clone = clone $this;
        $clone->nominalCodeStock = $nominalCodeStock;
        return $clone;
    }

    public function getNominalCodePurchases(): ?string
    {
        return $this->nominalCodePurchases;
    }

    public function withNominalCodePurchases(string $nominalCodePurchases): Product
    {
        $clone = clone $this;
        $clone->nominalCodePurchases = $nominalCodePurchases;
        return $clone;
    }

    public function getNominalCodeSales(): ?string
    {
        return $this->nominalCodeSales;
    }

    public function withNominalCodeSales(string $nominalCodeSales): Product
    {
        $clone = clone $this;
        $clone->nominalCodeSales = $nominalCodeSales;
        return $clone;
    }

    public function getSeasonIds(): array
    {
        return $this->seasonIds;
    }

    public function withSeasonIds(array $seasonIds): Product
    {
        $clone = clone $this;
        $clone->seasonIds = $seasonIds;
        return $clone;
    }

    public function getReporting(): ?Reporting
    {
        return $this->reporting;
    }

    public function withReporting(?Reporting $reporting): Product
    {
        $clone = clone $this;
        $clone->reporting = $reporting;
        return $clone;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function withStatus(string $status): Product
    {
        $clone = clone $this;
        $clone->status = $status;
        return $clone;
    }

    public function getSalesPopupMessage(): ?string
    {
        return $this->salesPopupMessage;
    }

    public function withSalesPopupMessage(string $salesPopupMessage): Product
    {
        $clone = clone $this;
        $clone->salesPopupMessage = $salesPopupMessage;
        return $clone;
    }

    public function getWarehousePopupMessage(): ?string
    {
        return $this->warehousePopupMessage;
    }

    public function withWarehousePopupMessage(string $warehousePopupMessage): Product
    {
        $clone = clone $this;
        $clone->warehousePopupMessage = $warehousePopupMessage;
        return $clone;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function withVersion(int $version): Product
    {
        $clone = clone $this;
        $clone->version = $version;
        return $clone;
    }

    public function getCustomFields(): array
    {
        return $this->customFields;
    }

    public function withCustomFields(array $customFields): Product
    {
        $clone = clone $this;
        $clone->customFields = $customFields;
        return $clone;
    }
}
