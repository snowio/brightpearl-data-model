<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote\Row;

class Order
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
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->productId = is_int($json['productId']) ? $json['productId'] : null;
        $result->quantity = is_int($json['quantity']) ? $json['quantity'] : null;
        $result->locationId = is_int($json['locationId']) ? $json['locationId'] : null;
        $result->externalRef = is_string($json['externalRef']) ? $json['externalRef'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'productId' => $this->getProductId(),
            'quantity' => $this->getQuantity(),
            'locationId' => $this->getLocationId(),
            'externalRef' => $this->getExternalRef()
        ];
    }

    /**
     * @param Order $orderToCompare
     * @return bool
     */
    public function equals(Order $orderToCompare): bool
    {
        if ($this->getProductId() !== $orderToCompare->getProductId()) {
            return false;
        }

        if ($this->getQuantity() !== $orderToCompare->getQuantity()) {
            return false;
        }

        if ($this->getExternalRef() !== $orderToCompare->getExternalRef()) {
            return false;
        }

        return $this->getLocationId() === $orderToCompare->getLocationId();
    }

    /**
     * @param int|null $productId
     * @return Order
     */
    public function withProductId(?int $productId): Order
    {
        $clone = clone $this;
        $clone->productId = $productId;
        return $clone;
    }

    /**
     * @param int|null $quantity
     * @return Order
     */
    public function withQuantity(?int $quantity): Order
    {
        $clone = clone $this;
        $clone->quantity = $quantity;
        return $clone;
    }

    /**
     * @param int|null $locationId
     * @return Order
     */
    public function withLocationId(?int $locationId): Order
    {
        $clone = clone $this;
        $clone->locationId = $locationId;
        return $clone;
    }

    /**
     * @param string|null $externalRef
     * @return Order
     */
    public function withExternalRef(?string $externalRef): Order
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @return int|null
     */
    public function getLocationId(): ?int
    {
        return $this->locationId;
    }

    /**
     * @return string|null
     */
    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }
}
