<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote\Row;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Order implements ModelInterface
{
    /** @var int|null $productId */
    private $productId;
    /** @var int|null $quantity */
    private $quantity;
    /** @var int|null $locationId */
    private $locationId;
    /** @var string|null $externalRef */
    private $externalRef;

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
        $result->quantity = $json['quantity'] ?? null;
        $result->locationId = $json['locationId'] ?? null;
        $result->externalRef = $json['externalRef'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'productId' => $this->getProductId(),
            'quantity' => $this->getQuantity(),
            'locationId' => $this->getLocationId(),
            'externalRef' => $this->getExternalRef()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Order &&
            $this->productId === $other->productId &&
            $this->quantity === $other->quantity &&
            $this->locationId === $other->locationId &&
            $this->externalRef === $other->externalRef;
    }

    public function withProductId(?int $productId): Order
    {
        $clone = clone $this;
        $clone->productId = $productId;
        return $clone;
    }

    public function withQuantity(?int $quantity): Order
    {
        $clone = clone $this;
        $clone->quantity = $quantity;
        return $clone;
    }

    public function withLocationId(?int $locationId): Order
    {
        $clone = clone $this;
        $clone->locationId = $locationId;
        return $clone;
    }

    public function withExternalRef(?string $externalRef): Order
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function getLocationId(): ?int
    {
        return $this->locationId;
    }

    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }
}
