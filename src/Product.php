<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;
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

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();

        $identity = is_array($json['identity']) ? $json['identity'] : [];
        $stock = is_array($json['stock']) ? $json['stock'] : [];
        $financialDetails = is_array($json['financialDetails']) ? $json['financialDetails'] : [];
        $composition = is_array($json['composition']) ? $json['composition'] : [];
        $warehouses = is_array($json['warehouses']) ? $json['warehouses'] : [];
        $seasonIds = is_array($json['seasonIds']) ? $json['seasonIds'] : [];
        $reporting = is_array($json['reporting']) ? $json['reporting'] : [];
        $customFields = is_array($json['customFields']) ? $json['customFields'] : [];

        $result->id = is_numeric($json['id']) ? (int) $json['id'] : null;
        $result->brandId = is_numeric($json['brandId']) ? (int) $json['brandId'] : null;
        $result->productTypeId = is_numeric($json['productTypeId']) ? (int) $json['productTypeId'] : null;
        $result->identity = Identity::fromJson($identity);
        $result->featured = is_bool($json['featured']) && $json['featured'];
        $result->stock = Stock::fromJson($stock);
        $result->financialDetails = FinancialDetails::fromJson($financialDetails);
        $result->composition = Composition::fromJson($composition);
        $result->createdOn = is_string($json['createdOn']) ? $json['createdOn'] : null;
        $result->updatedOn = is_string($json['updatedOn']) ? $json['updatedOn'] : null;
        $result->warehouses = Warehouses::fromJson($warehouses);
        $result->nominalCodeStock = is_string($json['nominalCodeStock']) ? $json['nominalCodeStock'] : null;
        $result->nominalCodePurchases = is_string($json['nominalCodePurchases']) ? $json['nominalCodePurchases'] : null;
        $result->nominalCodeSales = is_string($json['nominalCodeSales']) ? $json['nominalCodeSales'] : null;
        $result->seasonIds = $seasonIds;
        $result->reporting = Reporting::fromJson($reporting);
        $result->status = is_string($json['status']) ? $json['status'] : null;
        $result->salesPopupMessage = is_string($json['salesPopupMessage']) ? $json['salesPopupMessage'] : null;
        $result->warehousePopupMessage = is_string($json['warehousePopupMessage']) ? $json['warehousePopupMessage'] : null;
        $result->version = is_numeric($json['version']) ? (int) $json['version'] : null;
        $result->customFields = $customFields;

        $salesChannels = is_array($json['salesChannels']) ? $json['salesChannels'] : [];
        foreach ($salesChannels as $salesChannel) {
            $salesChannel = is_array($salesChannel) ? $salesChannel : [];
            $result->salesChannels[] = SalesChannel::fromJson($salesChannel);
        }

        $variations = is_array($json['variations']) ? $json['variations'] : [];
        foreach ($variations as $variation) {
            $variation = is_array($variation) ? $variation : [];
            $result->variations[] = Variation::fromJson($variation);
        }

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $salesChannels = [];
        foreach ($this->getSalesChannels() as $salesChannel) {
            $salesChannels[] = $salesChannel->toJson();
        }

        $variations = [];
        foreach ($this->getVariations() as $variation) {
            $variations[] = $variation->toJson();
        }

        $identity = is_null($this->getIdentity()) ? [] : $this->getIdentity()->toJson();
        $stock = is_null($this->getStock()) ? [] : $this->getStock()->toJson();
        $financialDetails = is_null($this->getFinancialDetails()) ? [] : $this->getFinancialDetails()->toJson();
        $composition = is_null($this->getComposition()) ? [] : $this->getComposition()->toJson();
        $warehouses = is_null($this->getWarehouses()) ? [] : $this->getWarehouses()->toJson();
        $reporting = is_null($this->getReporting()) ? [] : $this->getReporting()->toJson();

        return [
            'id' => $this->getId(),
            'brandId' => $this->getBrandId(),
            'productTypeId' => $this->getProductTypeId(),
            'identity' => $identity,
            'featured' => $this->isFeatured(),
            'stock' => $stock,
            'financialDetails' => $financialDetails,
            'salesChannels' => $salesChannels,
            'composition' => $composition,
            'variations' => $variations,
            'createdOn' => $this->getCreatedOn(),
            'updatedOn' => $this->getUpdatedOn(),
            'warehouses' => $warehouses,
            'nominalCodeStock' => $this->getNominalCodeStock(),
            'nominalCodePurchases' => $this->getNominalCodePurchases(),
            'nominalCodeSales' => $this->getNominalCodeSales(),
            'seasonIds' => $this->getSeasonIds(),
            'reporting' => $reporting,
            'status' => $this->getStatus(),
            'salesPopupMessage' => $this->getSalesPopupMessage(),
            'warehousePopupMessage' => $this->getWarehousePopupMessage(),
            'version' => $this->getVersion(),
            'customFields' => $this->getCustomFields()
        ];
    }

    /**
     * @param ModelInterface $productToCompare
     * @return bool
     */
    public function equals(ModelInterface $productToCompare): bool
    {
        return $this->toJson() === $productToCompare->toJson();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function withId(int $id): Product
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    /**
     * @param int $brandId
     * @return Product
     */
    public function withBrandId(int $brandId): Product
    {
        $clone = clone $this;
        $clone->brandId = $brandId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getProductTypeId(): ?int
    {
        return $this->productTypeId;
    }

    /**
     * @param int $productTypeId
     * @return Product
     */
    public function withProductTypeId(int $productTypeId): Product
    {
        $clone = clone $this;
        $clone->productTypeId = $productTypeId;
        return $clone;
    }

    /**
     * @return Identity|null
     */
    public function getIdentity(): ?Identity
    {
        return $this->identity;
    }

    /**
     * @param Identity $identity
     * @return Product
     */
    public function withIdentity(Identity $identity): Product
    {
        $clone = clone $this;
        $clone->identity = $identity;
        return $clone;
    }

    /**
     * @return bool|null
     */
    public function isFeatured(): ?bool
    {
        return $this->featured;
    }

    /**
     * @param bool $featured
     * @return Product
     */
    public function withFeatured(bool $featured): Product
    {
        $clone = clone $this;
        $clone->featured = $featured;
        return $clone;
    }

    /**
     * @return Stock|null
     */
    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    /**
     * @param Stock $stock
     * @return Product
     */
    public function withStock(Stock $stock): Product
    {
        $clone = clone $this;
        $clone->stock = $stock;
        return $clone;
    }

    /**
     * @return FinancialDetails|null
     */
    public function getFinancialDetails(): ?FinancialDetails
    {
        return $this->financialDetails;
    }

    /**
     * @param FinancialDetails $financialDetails
     * @return Product
     */
    public function withFinancialDetails(FinancialDetails $financialDetails): Product
    {
        $clone = clone $this;
        $clone->financialDetails = $financialDetails;
        return $clone;
    }

    /**
     * @return SalesChannel[]
     */
    public function getSalesChannels(): array
    {
        return $this->salesChannels;
    }

    /**
     * @param SalesChannel[] $salesChannels
     * @return Product
     */
    public function withSalesChannels(array $salesChannels): Product
    {
        $clone = clone $this;
        $clone->salesChannels = $salesChannels;
        return $clone;
    }

    /**
     * @return Composition|null
     */
    public function getComposition(): ?Composition
    {
        return $this->composition;
    }

    /**
     * @param Composition $composition
     * @return Product
     */
    public function withComposition(Composition $composition): Product
    {
        $clone = clone $this;
        $clone->composition = $composition;
        return $clone;
    }

    /**
     * @return Variation[]
     */
    public function getVariations(): array
    {
        return $this->variations;
    }

    /**
     * @param Variation[] $variations
     * @return Product
     */
    public function withVariations(array $variations): Product
    {
        $clone = clone $this;
        $clone->variations = $variations;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    /**
     * @param string $createdOn
     * @return Product
     */
    public function withCreatedOn(string $createdOn): Product
    {
        $clone = clone $this;
        $clone->createdOn = $createdOn;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getUpdatedOn(): ?string
    {
        return $this->updatedOn;
    }

    /**
     * @param string $updatedOn
     * @return Product
     */
    public function withUpdatedOn(string $updatedOn): Product
    {
        $clone = clone $this;
        $clone->updatedOn = $updatedOn;
        return $clone;
    }

    /**
     * @return Warehouses|null
     */
    public function getWarehouses(): ?Warehouses
    {
        return $this->warehouses;
    }

    /**
     * @param Warehouses|null $warehouses
     * @return Product
     */
    public function withWarehouses(?Warehouses $warehouses): Product
    {
        $clone = clone $this;
        $clone->warehouses = $warehouses;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getNominalCodeStock(): ?string
    {
        return $this->nominalCodeStock;
    }

    /**
     * @param string $nominalCodeStock
     * @return Product
     */
    public function withNominalCodeStock(string $nominalCodeStock): Product
    {
        $clone = clone $this;
        $clone->nominalCodeStock = $nominalCodeStock;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getNominalCodePurchases(): ?string
    {
        return $this->nominalCodePurchases;
    }

    /**
     * @param string $nominalCodePurchases
     * @return Product
     */
    public function withNominalCodePurchases(string $nominalCodePurchases): Product
    {
        $clone = clone $this;
        $clone->nominalCodePurchases = $nominalCodePurchases;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getNominalCodeSales(): ?string
    {
        return $this->nominalCodeSales;
    }

    /**
     * @param string $nominalCodeSales
     * @return Product
     */
    public function withNominalCodeSales(string $nominalCodeSales): Product
    {
        $clone = clone $this;
        $clone->nominalCodeSales = $nominalCodeSales;
        return $clone;
    }

    /**
     * @return array<mixed>
     */
    public function getSeasonIds(): array
    {
        return $this->seasonIds;
    }

    /**
     * @param array<mixed> $seasonIds
     * @return Product
     */
    public function withSeasonIds(array $seasonIds): Product
    {
        $clone = clone $this;
        $clone->seasonIds = $seasonIds;
        return $clone;
    }

    /**
     * @return Reporting|null
     */
    public function getReporting(): ?Reporting
    {
        return $this->reporting;
    }

    /**
     * @param Reporting|null $reporting
     * @return Product
     */
    public function withReporting(?Reporting $reporting): Product
    {
        $clone = clone $this;
        $clone->reporting = $reporting;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Product
     */
    public function withStatus(string $status): Product
    {
        $clone = clone $this;
        $clone->status = $status;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getSalesPopupMessage(): ?string
    {
        return $this->salesPopupMessage;
    }

    /**
     * @param string $salesPopupMessage
     * @return Product
     */
    public function withSalesPopupMessage(string $salesPopupMessage): Product
    {
        $clone = clone $this;
        $clone->salesPopupMessage = $salesPopupMessage;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getWarehousePopupMessage(): ?string
    {
        return $this->warehousePopupMessage;
    }

    /**
     * @param string $warehousePopupMessage
     * @return Product
     */
    public function withWarehousePopupMessage(string $warehousePopupMessage): Product
    {
        $clone = clone $this;
        $clone->warehousePopupMessage = $warehousePopupMessage;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return Product
     */
    public function withVersion(int $version): Product
    {
        $clone = clone $this;
        $clone->version = $version;
        return $clone;
    }

    /**
     * @return array<mixed>
     */
    public function getCustomFields(): array
    {
        return $this->customFields;
    }

    /**
     * @param array<mixed> $customFields
     * @return Product
     */
    public function withCustomFields(array $customFields): Product
    {
        $clone = clone $this;
        $clone->customFields = $customFields;
        return $clone;
    }
}
