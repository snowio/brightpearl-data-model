<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse;

class Row
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

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return self
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->id = is_numeric($json['id']) ? (int)$json['id'] : null;
        $result->productId = is_numeric($json['productId']) ? (int)$json['productId'] : null;
        $result->name = is_string($json['name']) ? $json['name'] : null;
        $result->sku = is_string($json['sku']) ? $json['sku'] : null;
        $result->quantity = is_string($json['quantity']) ? $json['quantity'] : null;
        $result->taxCode = is_string($json['taxCode']) ? $json['taxCode'] : null;
        $result->tax = is_string($json['tax']) ? $json['tax'] : null;
        $result->net = is_string($json['net']) ? $json['net'] : null;
        $result->nominalCode = is_string($json['nominalCode']) ? $json['nominalCode'] : null;
        $result->productPrice = is_string($json['productPrice']) ? $json['productPrice'] : null;
        $result->discountPercentage = is_string($json['discountPercentage']) ? $json['discountPercentage'] : null;
        $result->sequence = is_numeric($json['sequence']) ? (int)$json['sequence'] : null;
        $result->bundleChild = is_bool($json['bundleChild']) && $json['bundleChild'];
        $result->bundleParent = is_bool($json['bundleParent']) && $json['bundleParent'];
        $result->parentRowId = is_numeric($json['parentRowId']) ? (int)$json['parentRowId'] : null;
        $result->taxClassId = is_numeric($json['taxClassId']) ? (int)$json['taxClassId'] : null;
        $result->taxCalculator = is_string($json['taxCalculator']) ? $json['taxCalculator'] : null;
        $result->clonedFromId = is_numeric($json['clonedFromId']) ? (int)$json['clonedFromId'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
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

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function withId(int $id): self
    {
        $result = clone $this;
        $result->id = $id;
        return $result;
    }

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return $this
     */
    public function withProductId(int $productId): self
    {
        $result = clone $this;
        $result->productId = $productId;
        return $result;
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
     * @return $this
     */
    public function withName(string $name): self
    {
        $result = clone $this;
        $result->name = $name;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return $this
     */
    public function withSku(string $sku): self
    {
        $result = clone $this;
        $result->sku = $sku;
        return $result;
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
     * @return $this
     */
    public function withQuantity(string $quantity): self
    {
        $result = clone $this;
        $result->quantity = $quantity;
        return $result;
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
     * @return $this
     */
    public function withTaxCode(string $taxCode): self
    {
        $result = clone $this;
        $result->taxCode = $taxCode;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getTax(): ?string
    {
        return $this->tax;
    }

    /**
     * @param string $tax
     * @return $this
     */
    public function withTax(string $tax): self
    {
        $result = clone $this;
        $result->tax = $tax;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getNet(): ?string
    {
        return $this->net;
    }

    /**
     * @param string $net
     * @return $this
     */
    public function withNet(string $net): self
    {
        $result = clone $this;
        $result->net = $net;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getNominalCode(): ?string
    {
        return $this->nominalCode;
    }

    /**
     * @param string $nominalCode
     * @return $this
     */
    public function withNominalCode(string $nominalCode): self
    {
        $result = clone $this;
        $result->nominalCode = $nominalCode;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getProductPrice(): ?string
    {
        return $this->productPrice;
    }

    /**
     * @param string $productPrice
     * @return $this
     */
    public function withProductPrice(string $productPrice): self
    {
        $result = clone $this;
        $result->productPrice = $productPrice;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getDiscountPercentage(): ?string
    {
        return $this->discountPercentage;
    }

    /**
     * @param string $discountPercentage
     * @return $this
     */
    public function withDiscountPercentage(string $discountPercentage): self
    {
        $result = clone $this;
        $result->discountPercentage = $discountPercentage;
        return $result;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @param int $sequence
     * @return $this
     */
    public function withSequence(int $sequence): self
    {
        $result = clone $this;
        $result->sequence = $sequence;
        return $result;
    }

    /**
     * @return bool|null
     */
    public function getBundleChild(): ?bool
    {
        return $this->bundleChild;
    }

    /**
     * @param bool $bundleChild
     * @return $this
     */
    public function withBundleChild(bool $bundleChild): self
    {
        $result = clone $this;
        $result->bundleChild = $bundleChild;
        return $result;
    }

    /**
     * @return bool|null
     */
    public function getBundleParent(): ?bool
    {
        return $this->bundleParent;
    }

    /**
     * @param bool $bundleParent
     * @return $this
     */
    public function withBundleParent(bool $bundleParent): self
    {
        $result = clone $this;
        $result->bundleParent = $bundleParent;
        return $result;
    }

    /**
     * @return int|null
     */
    public function getParentRowId(): ?int
    {
        return $this->parentRowId;
    }

    /**
     * @param int $parentRowId
     * @return $this
     */
    public function withParentRowId(int $parentRowId): self
    {
        $result = clone $this;
        $result->parentRowId = $parentRowId;
        return $result;
    }

    /**
     * @return int|null
     */
    public function getTaxClassId(): ?int
    {
        return $this->taxClassId;
    }

    /**
     * @param int $taxClassId
     * @return $this
     */
    public function withTaxClassId(int $taxClassId): self
    {
        $result = clone $this;
        $result->taxClassId = $taxClassId;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getTaxCalculator(): ?string
    {
        return $this->taxCalculator;
    }

    /**
     * @param string $taxCalculator
     * @return $this
     */
    public function withTaxCalculator(string $taxCalculator): self
    {
        $result = clone $this;
        $result->taxCalculator = $taxCalculator;
        return $result;
    }

    /**
     * @return int|null
     */
    public function getClonedFromId(): ?int
    {
        return $this->clonedFromId;
    }

    /**
     * @param int $clonedFromId
     * @return $this
     */
    public function withClonedFromId(int $clonedFromId): self
    {
        $result = clone $this;
        $result->clonedFromId = $clonedFromId;
        return $result;
    }
}
