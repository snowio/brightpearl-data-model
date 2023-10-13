<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

use SnowIO\BrightpearlDataModel\ModelInterface;

class OrderStatus implements ModelInterface
{
    /** @var int|null $orderStatusId */
    private $orderStatusId;
    /** @var string|null $name */
    private $name;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->orderStatusId = $json['orderStatusId'] ?? null;
        $result->name = $json['name'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'orderStatusId' => $this->getOrderStatusId(),
            'name' => $this->getName(),
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof OrderStatus &&
           $this->orderStatusId === $other->orderStatusId &&
           $this->name === $other->name;
    }

    public function getOrderStatusId(): ?int
    {
        return $this->orderStatusId;
    }

    public function withOrderStatusId(int $orderStatusId): OrderStatus
    {
        $clone = clone $this;
        $clone->orderStatusId = $orderStatusId;
        return $clone;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function withName(string $name): OrderStatus
    {
        $clone = clone $this;
        $clone->name = $name;
        return $clone;
    }
}
