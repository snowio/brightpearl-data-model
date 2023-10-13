<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Row implements ModelInterface
{
    /** @var int|null $productId */
    protected $productId;
    /** @var string|null $name */
    protected $name;
    /** @var string|null $quantity */
    protected $quantity;
    /** @var string|null $taxCode */
    protected $taxCode;
    /** @var string|null $net */
    protected $net;
    /** @var string|null $tax */
    protected $tax;
    /** @var string|null $nominalCode */
    protected $nominalCode;
    /** @var string|null $externalRef */
    protected $externalRef;


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
        $result->productId = $json['productId'] ?? null;
        $result->name = $json['name'] ?? null;
        $result->quantity = $json['quantity'] ?? null;
        $result->taxCode = $json['taxCode'] ?? null;
        $result->net = $json['net'] ?? null;
        $result->tax = $json['tax'] ?? null;
        $result->nominalCode = $json['nominalCode'] ?? null;
        $result->externalRef = $json['externalRef'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'productId' => $this->getProductId(),
            'name' => $this->getName(),
            'quantity' => $this->getQuantity(),
            'taxCode' => $this->getTaxCode(),
            'net' => $this->getNet(),
            'tax' => $this->getTax(),
            'nominalCode' => $this->getNominalCode(),
            'externalRef' => $this->getExternalRef(),
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Row &&
            $this->productId === $other->productId &&
            $this->name === $other->name  &&
            $this->quantity === $other->quantity  &&
            $this->taxCode === $other->taxCode  &&
            $this->net === $other->net &&
            $this->tax === $other->tax &&
            $this->nominalCode === $other->nominalCode &&
            $this->externalRef === $other->externalRef;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function withName(string $name): Row
    {
        $clone = clone $this;
        $clone->name = $name;
        return $clone;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function withQuantity(string $quantity): Row
    {
        $clone = clone $this;
        $clone->quantity = $quantity;
        return $clone;
    }

    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    public function withTaxCode(string $taxCode): Row
    {
        $clone = clone $this;
        $clone->taxCode = $taxCode;
        return $clone;
    }

    public function getNet(): ?string
    {
        return $this->net;
    }

    public function withNet(?string $net): Row
    {
        $clone = clone $this;
        $clone->net = $net;
        return $clone;
    }

    public function getTax(): ?string
    {
        return $this->tax;
    }

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

    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    public function withExternalRef(?string $externalRef): Row
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }
}
