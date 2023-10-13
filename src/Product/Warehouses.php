<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Warehouses implements ModelInterface
{
    /** @var int|null $defaultLocationId */
    private $defaultLocationId;
    /** @var int|null $reorderLevel */
    private $reorderLevel;
    /** @var int|null $reorderQuantity */
    private $reorderQuantity;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->defaultLocationId = $json['defaultLocationId'] ?? null;
        $result->reorderLevel = $json['reorderLevel'] ?? null;
        $result->reorderQuantity = $json['reorderQuantity'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'defaultLocationId' => $this->getDefaultLocationId(),
            'reorderLevel' => $this->getReorderLevel(),
            'reorderQuantity' => $this->getReorderQuantity()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Warehouses &&
            $this->defaultLocationId === $other->defaultLocationId &&
            $this->reorderLevel === $other->reorderLevel &&
            $this->reorderQuantity === $other->reorderQuantity;
    }

    public function getDefaultLocationId(): ?int
    {
        return $this->defaultLocationId;
    }

    public function withDefaultLocationId(?int $defaultLocationId): Warehouses
    {
        $clone = clone $this;
        $clone->defaultLocationId = $defaultLocationId;
        return $clone;
    }

    public function getReorderLevel(): ?int
    {
        return $this->reorderLevel;
    }

    public function withReorderLevel(?int $reorderLevel): Warehouses
    {
        $clone = clone $this;
        $clone->reorderLevel = $reorderLevel;
        return $clone;
    }

    public function getReorderQuantity(): ?int
    {
        return $this->reorderQuantity;
    }

    public function withReorderQuantity(?int $reorderQuantity): Warehouses
    {
        $clone = clone $this;
        $clone->reorderQuantity = $reorderQuantity;
        return $clone;
    }
}
