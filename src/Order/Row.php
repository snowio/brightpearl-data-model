<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Row implements ModelInterface
{
    /** @var int|null $orderRowSequence */
    private $orderRowSequence;
    /** @var int|null $productId */
    private $productId;
    /** @var string|null $productName */
    private $productName;
    /** @var string|null $productSku */
    protected $productSku;
    /** @var int $quantity */
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
        $result->orderRowSequence = $json['orderRowSequence'] ?? null;
        $result->productId = $json['productId'] ?? null;
        $result->productSku = $json['productSku'] ?? null;
        $result->productName = $json['productName'] ?? null;
        $result->quantity = $json['quantity']['magnitude'] ?? null;
        $result->taxCode = $json['taxCode'] ?? null;
        $result->net = $json['net'] ?? null;
        $result->tax = $json['tax'] ?? null;
        $result->nominalCode = $json['nominalCode'] ?? null;
        $result->externalRef = $json['externalRef'] ?? null;
        $result->orderRows = $json['orderRows'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'orderRowSequence' => $this->getOrderRowSequence(),
            'productId' => $this->getProductId(),
            'productName' => $this->getProductName(),
            'productSku' => $this->getProductSku(),
            'quantity' => $this->getQuantity() ? ["magnitude" => $this->getQuantity()] : null,
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
            $this->orderRowSequence === $other->orderRowSequence &&
            $this->productId === $other->productId &&
            $this->productName === $other->productName &&
            $this->productSku === $other->productSku &&
            $this->quantity === $other->quantity &&
            $this->taxCode === $other->taxCode &&
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

    public function getOrderRowSequence(): ?int
    {
        return $this->orderRowSequence;
    }

    public function withOrderRowSequence(int $orderRowSequence): Row
    {
        $clone = clone $this;
        $clone->orderRowSequence = $orderRowSequence;
        return $clone;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function withProductName(string $productName): Row
    {
        $clone = clone $this;
        $clone->productName = $productName;
        return $clone;
    }

    public function getProductSku(): ?string
    {
        return $this->productSku;
    }

    public function withProductSku(?string $productSku): Row
    {
        $clone = clone $this;
        $clone->productSku = $productSku;
        return $clone;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function withQuantity(?int $quantity): Row
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
