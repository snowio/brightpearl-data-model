<?php

namespace SnowIO\BrightpearlDataModel\ProductAvailability;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Total implements ModelInterface
{
    /** @var int|null $inStock */
    private $inStock;
    /** @var int|null $onHand */
    private $onHand;
    /** @var int|null $allocated */
    private $allocated;
    /** @var int|null $inTransit */
    private $inTransit;

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
        $result->inStock = $json['inStock'] ?? null;
        $result->onHand = $json['onHand'] ?? null;
        $result->allocated = $json['allocated'] ?? null;
        $result->inTransit = $json['inTransit'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'inStock' => $this->inStock,
            'onHand' => $this->onHand,
            'allocated' => $this->allocated,
            'inTransit' => $this->inTransit
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Total &&
            $this->inStock === $other->inStock &&
            $this->onHand === $other->onHand &&
            $this->allocated === $other->allocated &&
            $this->inTransit === $other->inTransit;
    }

    public function getInStock(): ?int
    {
        return $this->inStock;
    }

    public function withInStock(?int $inStock): Total
    {
        $clone = clone $this;
        $clone->inStock = $inStock;
        return $clone;
    }

    public function getOnHand(): ?int
    {
        return $this->onHand;
    }

    public function withOnHand(?int $onHand): Total
    {
        $clone = clone $this;
        $clone->onHand = $onHand;
        return $clone;
    }

    public function getAllocated(): ?int
    {
        return $this->allocated;
    }

    public function withAllocated(?int $allocated): Total
    {
        $clone = clone $this;
        $clone->allocated = $allocated;
        return $clone;
    }

    public function getInTransit(): ?int
    {
        return $this->inTransit;
    }

    public function withInTransit(?int $inTransit): Total
    {
        $clone = clone $this;
        $clone->inTransit = $inTransit;
        return $clone;
    }
}
