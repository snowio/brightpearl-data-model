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

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     * @return Delivery
     */
    public function withDate(?string $date): Delivery
    {
        $clone = clone $this;
        $clone->date = $date;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getShippingMethodId(): ?int
    {
        return $this->shippingMethodId;
    }

    /**
     * @param int|null $shippingMethodId
     * @return Delivery
     */
    public function withShippingMethodId(?int $shippingMethodId): Delivery
    {
        $clone = clone $this;
        $clone->shippingMethodId = $shippingMethodId;
        return $clone;
    }
}
