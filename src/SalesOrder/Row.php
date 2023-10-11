<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

class Row
{
    /** @var int|null $id */
    private $id;
    /** @var string|null $sku */
    private $sku;
    /** @var int|null $productId */
    private $productId;
    /** @var string|null $name */
    private $name;
    /** @var string|null $quantity */
    private $quantity;
    /** @var string|null $taxCode */
    private $taxCode;
    /** @var string|null $net */
    private $net;
    /** @var string|null $tax */
    private $tax;
    /** @var string|null $nominalCode */
    private $nominalCode;
    /** @var string|null $productPrice */
    private $productPrice;
    /** @var string|null $sequence */
    private $sequence;
    /** @var string|null $bundleChild */
    private $bundleChild;
    /** @var string|null $bundleParent */
    private $bundleParent;
    /** @var string|null $parentRowId */
    private $parentRowId;
    /** @var string|null $taxClassId */
    private $taxClassId;
    /** @var string|null $taxCalculator */
    private $taxCalculator;
    /** @var string|null $clonedFromId */
    private $clonedFromId;


    public static function create(): self
    {
        return new self();
    }

    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->id = $json['id'] ?? null;
        $result->sku = $json['sku'] ?? null;
        $result->productId = $json['productId'] ?? null;
        $result->name = $json['name'] ?? null;
        $result->quantity = $json['quantity'] ?? null;
        $result->taxCode = $json['taxCode'] ?? null;
        $result->net = $json['net'] ?? null;
        $result->tax = $json['tax'] ?? null;
        $result->nominalCode = $json['nominalCode'] ?? null;
        $result->productPrice = $json['productPrice'] ?? null;
        $result->sequence = $json['sequence'] ?? null;
        $result->bundleChild = $json['bundleChild'] ?? null;
        $result->bundleParent = $json['bundleParent'] ?? null;
        $result->parentRowId = $json['parentRowId'] ?? null;
        $result->taxClassId = $json['taxClassId'] ?? null;
        $result->taxCalculator = $json['taxCalculator'] ?? null;
        $result->clonedFromId = $json['clonedFromId'] ?? null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'sku' => $this->getSku(),
            'productId' => $this->getProductId(),
            'name' => $this->getName(),
            'quantity' => $this->getQuantity(),
            'taxCode' => $this->getTaxCode(),
            'net' => $this->getNet(),
            'tax' => $this->getTax(),
            'nominalCode' => $this->getNominalCode(),
            'productPrice' => $this->getProductPrice(),
            'discountPercentage' => "0.00",
            'sequence' => $this->getSequence(),
            'bundleChild' => false,
            'bundleParent' => false,
            'parentRowId' => $this->getParentRowId(),
            'taxClassId' => $this->getTaxClassId(),
            'taxCalculator' => $this->getTaxCalculator(),
            'clonedFromId' => $this->getClonedFromId()
        ];
    }

    /**
     * @param Row $rowToCompare
     * @return bool
     */
    public function equals(Row $rowToCompare): bool
    {
        if ($this->getProductId() !== $rowToCompare->getProductId()) {
            return false;
        }
        if ($this->getName() !== $rowToCompare->getName()) {
            return false;
        }
        if ($this->getQuantity() !== $rowToCompare->getQuantity()) {
            return false;
        }
        if ($this->getTaxCode() !== $rowToCompare->getTaxCode()) {
            return false;
        }
        if ($this->getNet() !== $rowToCompare->getNet()) {
            return false;
        }
        if ($this->getTax() !== $rowToCompare->getTax()) {
            return false;
        }
        if ($this->getNominalCode() !== $rowToCompare->getNominalCode()) {
            return false;
        }
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function withProductId(int $productId): Row
    {
        $clone = clone $this;
        $clone->productId = $productId;
        return $clone;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function withSku(?string $sku): Row
    {
        $clone = clone $this;
        $clone->sku = $sku;
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

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Row
     */
    public function withName(string $name): Row
    {
        $clone = clone $this;
        $clone->name = $name;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     * @return Row
     */
    public function withQuantity(string $quantity): Row
    {
        $clone = clone $this;
        $clone->quantity = $quantity;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    /**
     * @param string $taxCode
     * @return Row
     */
    public function withTaxCode(string $taxCode): Row
    {
        $clone = clone $this;
        $clone->taxCode = $taxCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getNet(): ?string
    {
        return $this->net;
    }

    /**
     * @param string|null $net
     * @return Row
     */
    public function withNet(?string $net): Row
    {
        $clone = clone $this;
        $clone->net = $net;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTax(): ?string
    {
        return $this->tax;
    }

    /**
     * @param string|null $tax
     * @return Row
     */
    public function withTax(?string $tax): Row
    {
        $clone = clone $this;
        $clone->tax = $tax;
        return $clone;
    }

    public function getNominalCode(): ?string
    {
        return $this->nominalCode;
    }

    public function withNominalCode(?string $nominalCode): Row
    {
        $clone = clone $this;
        $clone->nominalCode = $nominalCode;
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
}
