<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Row implements ModelInterface
{
    /** @var int|null $id */
    private $id;
    /** @var int|null $productId */
    private $productId;
    /** @var string|null $name */
    private $name;
    /** @var string|null $sku */
    private $sku;
    /** @var string|null $quantity */
    private $quantity;
    /** @var string|null $taxCode */
    private $taxCode;
    /** @var string|null $tax */
    private $tax;
    /** @var string|null $net */
    private $net;
    /** @var string|null $nominalCode */
    private $nominalCode;
    /** @var string|null $productPrice */
    private $productPrice;
    /** @var string|null $discountPercentage */
    private $discountPercentage;
    /** @var int|null $sequence */
    private $sequence;
    /** @var bool|null $bundleChild */
    private $bundleChild;
    /** @var bool|null $bundleParent */
    private $bundleParent;
    /** @var int|null $parentRowId */
    private $parentRowId;
    /** @var int|null $taxClassId */
    private $taxClassId;
    /** @var string|null $taxCalculator */
    private $taxCalculator;
    /** @var int|null $clonedFromId */
    private $clonedFromId;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->id = $json['id'] ?? null;
        $result->productId = $json['productId'] ?? null;
        $result->name = $json['name'] ?? null;
        $result->sku = $json['sku'] ?? null;
        $result->quantity = $json['quantity'] ?? null;
        $result->taxCode = $json['taxCode'] ?? null;
        $result->tax = $json['tax'] ?? null;
        $result->net = $json['net'] ?? null;
        $result->nominalCode = $json['nominalCode'] ?? null;
        $result->productPrice = $json['productPrice'] ?? null;
        $result->discountPercentage = $json['discountPercentage'] ?? null;
        $result->sequence = $json['sequence'] ?? null;
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
            'productId' => $this->getProductId(),
            'name' => $this->getName(),
            'sku' => $this->getSku(),
            'quantity' => $this->getQuantity(),
            'taxCode' => $this->getTaxCode(),
            'tax' => $this->getTax(),
            'net' => $this->getNet(),
            'nominalCode' => $this->getNominalCode(),
            'productPrice' => $this->getProductPrice(),
            'discountPercentage' => $this->getDiscountPercentage(),
            'sequence' => $this->getSequence(),
            'bundleChild' => $this->getBundleChild(),
            'bundleParent' => $this->getBundleParent(),
            'parentRowId' => $this->getParentRowId(),
            'taxClassId' => $this->getTaxClassId(),
            'taxCalculator' => $this->getTaxCalculator(),
            'clonedFromId' => $this->getClonedFromId(),
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Row &&
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function withId(int $id): self
    {
        $result = clone $this;
        $result->id = $id;
        return $result;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function withProductId(int $productId): self
    {
        $result = clone $this;
        $result->productId = $productId;
        return $result;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function withName(string $name): self
    {
        $result = clone $this;
        $result->name = $name;
        return $result;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function withSku(string $sku): self
    {
        $result = clone $this;
        $result->sku = $sku;
        return $result;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function withQuantity(string $quantity): self
    {
        $result = clone $this;
        $result->quantity = $quantity;
        return $result;
    }

    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    public function withTaxCode(string $taxCode): self
    {
        $result = clone $this;
        $result->taxCode = $taxCode;
        return $result;
    }

    public function getTax(): ?string
    {
        return $this->tax;
    }

    public function withTax(string $tax): self
    {
        $result = clone $this;
        $result->tax = $tax;
        return $result;
    }

    public function getNet(): ?string
    {
        return $this->net;
    }

    public function withNet(string $net): self
    {
        $result = clone $this;
        $result->net = $net;
        return $result;
    }

    public function getNominalCode(): ?string
    {
        return $this->nominalCode;
    }

    public function withNominalCode(string $nominalCode): self
    {
        $result = clone $this;
        $result->nominalCode = $nominalCode;
        return $result;
    }

    public function getProductPrice(): ?string
    {
        return $this->productPrice;
    }

    public function withProductPrice(string $productPrice): self
    {
        $result = clone $this;
        $result->productPrice = $productPrice;
        return $result;
    }

    public function getDiscountPercentage(): ?string
    {
        return $this->discountPercentage;
    }

    public function withDiscountPercentage(string $discountPercentage): self
    {
        $result = clone $this;
        $result->discountPercentage = $discountPercentage;
        return $result;
    }

    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    public function withSequence(int $sequence): self
    {
        $result = clone $this;
        $result->sequence = $sequence;
        return $result;
    }

    public function getBundleChild(): ?bool
    {
        return $this->bundleChild;
    }

    public function withBundleChild(bool $bundleChild): self
    {
        $result = clone $this;
        $result->bundleChild = $bundleChild;
        return $result;
    }

    public function getBundleParent(): ?bool
    {
        return $this->bundleParent;
    }

    public function withBundleParent(bool $bundleParent): self
    {
        $result = clone $this;
        $result->bundleParent = $bundleParent;
        return $result;
    }

    public function getParentRowId(): ?int
    {
        return $this->parentRowId;
    }

    public function withParentRowId(int $parentRowId): self
    {
        $result = clone $this;
        $result->parentRowId = $parentRowId;
        return $result;
    }

    public function getTaxClassId(): ?int
    {
        return $this->taxClassId;
    }

    public function withTaxClassId(int $taxClassId): self
    {
        $result = clone $this;
        $result->taxClassId = $taxClassId;
        return $result;
    }

    public function getTaxCalculator(): ?string
    {
        return $this->taxCalculator;
    }

    public function withTaxCalculator(string $taxCalculator): self
    {
        $result = clone $this;
        $result->taxCalculator = $taxCalculator;
        return $result;
    }

    public function getClonedFromId(): ?int
    {
        return $this->clonedFromId;
    }

    public function withClonedFromId(int $clonedFromId): self
    {
        $result = clone $this;
        $result->clonedFromId = $clonedFromId;
        return $result;
    }
}
