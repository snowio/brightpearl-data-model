<?php

namespace SnowIO\BrightpearlDataModel\SalesCredit\RowCollection;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Row implements ModelInterface
{
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
    /** @var string|null $externalRef */
    private $externalRef;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->productId = $json['productId'] ?? null;
        $result->name = $json['name'] ?? null;
        $result->quantity =$json['quantity'] ?? null;
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
            'externalRef' => $this->getExternalRef()
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
            $this->externalRef === $other->externalRef;
    }

    public function withProductId(?int $productId): Row
    {
        $result = clone $this;
        $result->productId = $productId;
        return $result;
    }

    public function withName(?string $name):  Row
    {
        $result = clone $this;
        $result->name = $name;
        return $result;
    }

    public function withQuantity(?string $quantity):  Row
    {
        $result = clone $this;
        $result->quantity = $quantity;
        return $result;
    }

    public function withTaxCode(?string $taxCode):  Row
    {
        $result = clone $this;
        $result->taxCode = $taxCode;
        return $result;
    }

    public function withNet(?string $net):  Row
    {
        $result = clone $this;
        $result->net = $net;
        return $result;
    }

    public function withTax(?string $tax):  Row
    {
        $result = clone $this;
        $result->tax = $tax;
        return $result;
    }

    public function withNominalCode(?string $nominalCode):  Row
    {
        $result = clone $this;
        $result->nominalCode = $nominalCode;
        return $result;
    }

    public function withExternalRef(?string $externalRef):  Row
    {
        $result = clone $this;
        $result->externalRef = $externalRef;
        return $result;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    public function getNet(): ?string
    {
        return $this->net;
    }

    public function getTax(): ?string
    {
        return $this->tax;
    }

    public function getNominalCode(): ?string
    {
        return $this->nominalCode;
    }

    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }
}
