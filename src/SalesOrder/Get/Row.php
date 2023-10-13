<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder\Get;

use SnowIO\BrightpearlDataModel\ModelInterface;
use SnowIO\BrightpearlDataModel\SalesOrder\Row as BaseRow;

class Row extends BaseRow implements ModelInterface
{
    /** @var string|null $sku */
    protected $sku;
    /** @var int|null $id */
    protected $id;
    /** @var string|null $discountPercentage */
    protected $discountPercentage;
    /** @var bool|null $bundleChild */
    protected $bundleChild;
    /** @var bool|null $bundleParent */
    protected $bundleParent;
    /** @var string|null $parentRowId */
    protected $parentRowId;
    /** @var string|null $taxClassId */
    protected $taxClassId;
    /** @var string|null $taxCalculator */
    protected $taxCalculator;
    /** @var string|null $clonedFromId */
    protected $clonedFromId;
    /** @var string|null $productPrice */
    protected $productPrice;
    /** @var string|null $sequence */
    protected $sequence;

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
        $result->sku = $json['sku'] ?? null;
        $result->externalRef = $json['externalRef'] ?? null;
        $result->productId = $json['productId'] ?? null;
        $result->name = $json['name'] ?? null;
        $result->quantity = $json['quantity'] ?? null;
        $result->taxCode = $json['taxCode'] ?? null;
        $result->net = $json['net'] ?? null;
        $result->tax = $json['tax'] ?? null;
        $result->nominalCode = $json['nominalCode'] ?? null;
        $result->productPrice = $json['productPrice'] ?? null;
        $result->sequence = $json['sequence'] ?? null;
        $result->discountPercentage = $json['discountPercentage'] ?? null;
        $result->bundleChild = $json['bundleChild'] ?? null;
        $result->bundleParent = $json['bundleParent'] ?? null;
        $result->parentRowId = $json['parentRowId'] ?? null;
        $result->taxClassId = $json['taxClassId'] ?? null;
        $result->taxCalculator = $json['taxCalculator'] ?? null;
        $result->clonedFromId = $json['clonedFromId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'externalRef' => $this->getExternalRef(),
            'sku' => $this->getSku(),
            'productId' => $this->getProductId(),
            'name' => $this->getName(),
            'quantity' => $this->getQuantity(),
            'taxCode' => $this->getTaxCode(),
            'net' => $this->getNet(),
            'tax' => $this->getTax(),
            'nominalCode' => $this->getNominalCode(),
            'productPrice' => $this->getProductPrice(),
            'discountPercentage' => $this->getDiscountPercentage(),
            'sequence' => $this->getSequence(),
            'bundleChild' => $this->getBundleChild(),
            'bundleParent' => $this->getBundleParent(),
            'parentRowId' => $this->getParentRowId(),
            'taxClassId' => $this->getTaxClassId(),
            'taxCalculator' => $this->getTaxCalculator(),
            'clonedFromId' => $this->getClonedFromId()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Row &&
            $this->id === $other->id &&
            $this->externalRef === $other->externalRef &&
            $this->sku === $other->sku &&
            $this->productId === $other->productId &&
            $this->name === $other->name &&
            $this->quantity === $other->quantity &&
            $this->taxCode === $other->taxCode &&
            $this->net === $other->net &&
            $this->tax === $other->tax &&
            $this->nominalCode === $other->nominalCode &&
            $this->productPrice === $other->productPrice &&
            $this->discountPercentage === $other->discountPercentage &&
            $this->sequence === $other->sequence &&
            $this->bundleChild === $other->bundleChild &&
            $this->bundleParent === $other->bundleParent &&
            $this->parentRowId === $other->parentRowId &&
            $this->taxClassId === $other->taxClassId &&
            $this->taxCalculator === $other->taxCalculator &&
            $this->clonedFromId === $other->clonedFromId;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function withSku(?string $sku): self
    {
        $clone = clone $this;
        $clone->sku = $sku;
        return $clone;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function withId(int $id): Row
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

    public function getProductPrice(): ?string
    {
        return $this->productPrice;
    }

    public function withProductPrice(?string $productPrice): Row
    {
        $clone = clone $this;
        $clone->productPrice = $productPrice;
        return $clone;
    }

    public function getSequence(): ?string
    {
        return $this->sequence;
    }

    public function withSequence(?string $sequence): Row
    {
        $clone = clone $this;
        $clone->sequence = $sequence;
        return $clone;
    }

    public function getParentRowId(): ?string
    {
        return $this->parentRowId;
    }

    public function withParentRowId(?string $parentRowId): Row
    {
        $clone = clone $this;
        $clone->parentRowId = $parentRowId;
        return $clone;
    }

    public function getTaxClassId(): ?string
    {
        return $this->taxClassId;
    }

    public function withTaxClassId(?string $taxClassId): Row
    {
        $clone = clone $this;
        $clone->taxClassId = $taxClassId;
        return $clone;
    }

    public function getTaxCalculator(): ?string
    {
        return $this->taxCalculator;
    }

    public function withTaxCalculator(?string $taxCalculator): Row
    {
        $clone = clone $this;
        $clone->taxCalculator = $taxCalculator;
        return $clone;
    }

    public function getClonedFromId(): ?string
    {
        return $this->clonedFromId;
    }

    public function withClonedFromId(?string $clonedFromId): Row
    {
        $clone = clone $this;
        $clone->clonedFromId = $clonedFromId;
        return $clone;
    }

    public function getBundleChild(): ?bool
    {
        return $this->bundleChild;
    }

    public function withBundleChild(?bool $bundleChild): Row
    {
        $clone = clone $this;
        $clone->bundleChild = $bundleChild;
        return $clone;
    }

    public function getBundleParent(): ?bool
    {
        return $this->bundleParent;
    }

    public function withBundleParent(?bool $bundleParent): Row
    {
        $clone = clone $this;
        $clone->bundleParent = $bundleParent;
        return $clone;
    }

    public function getDiscountPercentage(): ?string
    {
        return $this->discountPercentage;
    }

    public function withDiscountPercentage(?string $discountPercentage): Row
    {
        $clone = clone $this;
        $clone->discountPercentage = $discountPercentage;
        return $clone;
    }
}
