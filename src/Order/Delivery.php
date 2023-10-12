<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Delivery implements ModelInterface
{
    /** @var string|null $date */
    private $date;
    /** @var int|null $shippingMethodId */
    private $shippingMethodId;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->date = $json['deliveryDate'] ?? null;
        $result->shippingMethodId = $json['shippingMethodId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'deliveryDate' => $this->getDate(),
            'shippingMethodId' => $this->getShippingMethodId()
        ];
    }

    public function equals($other): bool
    {
        return $other instanceof Delivery &&
            $this->date === $other->date &&
            $this->shippingMethodId === $other->shippingMethodId;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function withDate(?string $date): Delivery
    {
        $clone = clone $this;
        $clone->date = $date;
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
