<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Delivery implements ModelInterface
{
    /** @var string|null $deliveryDate */
    private $deliveryDate;
    /** @var int|null $shippingMethodId */
    private $shippingMethodId;

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
        $result->deliveryDate = $json['deliveryDate'] ?? null;
        $result->shippingMethodId = $json['shippingMethodId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'deliveryDate' => $this->getDeliveryDate(),
            'shippingMethodId' => $this->getShippingMethodId()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return ($other instanceof Delivery) &&
            $this->deliveryDate === $other->deliveryDate &&
            $this->shippingMethodId === $other->shippingMethodId;
    }

    public function getDeliveryDate(): ?string
    {
        return $this->deliveryDate;
    }

    public function withDeliveryDate(?string $deliveryDate): Delivery
    {
        $clone = clone $this;
        $clone->deliveryDate = $deliveryDate;
        return $clone;
    }

    public function getShippingMethodId(): ?int
    {
        return $this->shippingMethodId;
    }

    public function withShippingMethodId(?int $shippingMethodId): Delivery
    {
        $clone = clone $this;
        $clone->shippingMethodId = $shippingMethodId;
        return $clone;
    }
}
