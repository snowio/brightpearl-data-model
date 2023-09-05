<?php

namespace SnowIO\BrightpearlDataModel;

use Online4Baby\Brightpearl\Product\Composition;
use Online4Baby\Brightpearl\Product\FinancialDetails;
use Online4Baby\Brightpearl\Product\Identity;
use Online4Baby\Brightpearl\Product\Reporting;
use Online4Baby\Brightpearl\Product\SalesChannel;
use Online4Baby\Brightpearl\Product\Stock;
use Online4Baby\Brightpearl\Product\Variations;
use Online4Baby\Brightpearl\Product\Warehouses;

class Product
{
    /** @var int $id */
    private $id;
    /** @var int $brandId */
    private $brandId;
    /** @var int $productTypeId */
    private $productTypeId;
    /** @var Identity $identity */
    private $identity;
    /** @var bool $featured */
    private $featured;
    /** @var Stock $stock */
    private $stock;
    /** @var FinancialDetails $financialDetails */
    private $financialDetails;
    /** @var SalesChannel[] $salesChannels */
    private $salesChannels;
    /** @var Composition $composition */
    private $composition;
    /** @var Variations[]|null $variations */
    private $variations = null;
    /** @var string $createdOn */
    private $createdOn;
    /** @var string $updatedOn */
    private $updatedOn;
    /** @var Warehouses|null $warehouses */
    private $warehouses = null;
    /** @var string $nominalCodeStock */
    private $nominalCodeStock;
    /** @var string $nominalCodePurchases */
    private $nominalCodePurchases;
    /** @var string $nominalCodeSales */
    private $nominalCodeSales;
    /** @var array $seasonIds */
    private $seasonIds = [];
    /** @var Reporting|null $reporting */
    private $reporting = null;
    /** @var string $status */
    private $status;
    /** @var string $salesPopupMessage */
    private $salesPopupMessage = '';
    /** @var string $warehousePopupMessage */
    private $warehousePopupMessage = '';
    /** @var int $version */
    private $version;
    /** @var array $customFields */
    private $customFields;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->id = $json['id'];
        $result->brandId = $json['brandId'];
        $result->productTypeId = $json['productTypeId'];
        $result->identity = Identity::fromJson($json['identity']);
        $result->featured = $json['featured'];
        $result->stock = Stock::fromJson($json['stock']);
        $result->financialDetails = FinancialDetails::fromJson($json['financialDetails']);
        foreach ($json['salesChannels'] as $salesChannel) {
            $result->salesChannels[] = SalesChannel::fromJson($salesChannel);
        }
        $result->composition = Composition::fromJson($json['composition']);
        $result->variations = isset($json['variations']) ? Variations::fromJson($json['variations']) : null;
        $result->createdOn = $json['createdOn'];
        $result->updatedOn = $json['updatedOn'];
        $result->warehouses = isset($json['warehouses']) ? Warehouses::fromJson($json['warehouses']) : null;
        $result->nominalCodeStock = $json['nominalCodeStock'];
        $result->nominalCodePurchases = $json['nominalCodePurchases'];
        $result->nominalCodeSales = $json['nominalCodeSales'];
        $result->seasonIds = $json['seasonIds'];
        $result->reporting = isset($json['reporting']) ? Reporting::fromJson($json['reporting']) : null;
        $result->status = $json['status'];
        $result->salesPopupMessage = $json['salesPopupMessage'];
        $result->warehousePopupMessage = $json['warehousePopupMessage'];
        $result->version = $json['version'];
        $result->customFields = $json['customFields'] ?? [];

        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        $json['id'] = $this->getId();
        $json['brandId'] = $this->getBrandId();
        $json['productTypeId'] = $this->getProductTypeId();
        $json['identity'] = $this->getIdentity()->toJson();
        $json['featured'] = $this->isFeatured();
        $json['stock'] = $this->getStock()->toJson();
        $json['financialDetails'] = $this->getFinancialDetails()->toJson();
        foreach ($this->getSalesChannels() as $salesChannel) {
            $json['salesChannels'][] = $salesChannel->toJson();
        }
        $json['composition'] = $this->getComposition()->toJson();
        if ($this->getVariations()) {
            foreach ($this->getVariations() as $variation) {
                $json['variations'][] = $variation->toJson();
            }
        }
        $json['createdOn'] = $this->getCreatedOn();
        $json['updatedOn'] = $this->getUpdatedOn();
        if ($this->getWarehouses()) {
            $json['warehouses'] = $this->getWarehouses()->toJson();
        }
        $json['nominalCodeStock'] = $this->getNominalCodeStock();
        $json['nominalCodePurchases'] = $this->getNominalCodePurchases();
        $json['nominalCodeSales'] = $this->getNominalCodeSales();
        $json['seasonIds'] = $this->getSeasonIds();
        if ($this->getReporting()) {
            $json['reporting'] = $this->getReporting()->toJson();
        }
        $json['status'] = $this->getStatus();
        $json['salesPopupMessage'] = $this->getSalesPopupMessage();
        $json['warehousePopupMessage'] = $this->getWarehousePopupMessage();
        $json['version'] = $this->getVersion();
        $json['customFields'] = $this->getCustomFields() ?? [];

        return $json;
    }

    /**
     * @return int
     */
    public function getId(): int
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
     * @return int
     */
    public function getBrandId(): int
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
     * @return int
     */
    public function getProductTypeId(): int
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
     * @return Identity
     */
    public function getIdentity(): Identity
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
     * @return bool
     */
    public function isFeatured(): bool
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
     * @return Stock
     */
    public function getStock(): Stock
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
     * @return FinancialDetails
     */
    public function getFinancialDetails(): FinancialDetails
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
     * @return Composition
     */
    public function getComposition(): Composition
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
     * @return Variations[]|null
     */
    public function getVariations(): ?array
    {
        return $this->variations;
    }

    /**
     * @param Variations[]|null $variations
     * @return Product
     */
    public function withVariations(?array $variations): Product
    {
        $clone = clone $this;
        $clone->variations = $variations;
        return $clone;
    }

    /**
     * @return string
     */
    public function getCreatedOn(): string
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
     * @return string
     */
    public function getUpdatedOn(): string
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
     * @return string
     */
    public function getNominalCodeStock(): string
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
     * @return string
     */
    public function getNominalCodePurchases(): string
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
     * @return string
     */
    public function getNominalCodeSales(): string
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
     * @return array
     */
    public function getSeasonIds(): array
    {
        return $this->seasonIds;
    }

    /**
     * @param array $seasonIds
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
     * @return string
     */
    public function getStatus(): string
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
     * @return string
     */
    public function getSalesPopupMessage(): string
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
     * @return string
     */
    public function getWarehousePopupMessage(): string
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
     * @return int
     */
    public function getVersion(): int
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
     * @return array
     */
    public function getCustomFields(): array
    {
        return $this->customFields;
    }

    /**
     * @param array $customFields
     * @return Product
     */
    public function withCustomFields(array $customFields): Product
    {
        $clone = clone $this;
        $clone->customFields = $customFields;
        return $clone;
    }
}
