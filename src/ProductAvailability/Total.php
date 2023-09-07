<?php

namespace SnowIO\BrightpearlDataModel\ProductAvailability;

class Total
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
        $result->inStock = is_int($json['inStock']) ? $json['inStock'] : null;
        $result->onHand = is_int($json['onHand']) ? $json['onHand'] : null;
        $result->allocated = is_int($json['allocated']) ? $json['allocated'] : null;
        $result->inTransit = is_int($json['inTransit']) ? $json['inTransit'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'inStock' => $this->inStock,
            'onHand' => $this->onHand,
            'allocated' => $this->allocated,
            'inTransit' => $this->inTransit
        ];
    }

    /**
     * @return int|null
     */
    public function getInStock(): ?int
    {
        return $this->inStock;
    }

    /**
     * @param int|null $inStock
     * @return Total
     */
    public function withInStock(?int $inStock): Total
    {
        $clone = clone $this;
        $clone->inStock = $inStock;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getOnHand(): ?int
    {
        return $this->onHand;
    }

    /**
     * @param int|null $onHand
     * @return Total
     */
    public function withOnHand(?int $onHand): Total
    {
        $clone = clone $this;
        $clone->onHand = $onHand;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getAllocated(): ?int
    {
        return $this->allocated;
    }

    /**
     * @param int|null $allocated
     * @return Total
     */
    public function withAllocated(?int $allocated): Total
    {
        $clone = clone $this;
        $clone->allocated = $allocated;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getInTransit(): ?int
    {
        return $this->inTransit;
    }

    /**
     * @param int|null $inTransit
     * @return Total
     */
    public function withInTransit(?int $inTransit): Total
    {
        $clone = clone $this;
        $clone->inTransit = $inTransit;
        return $clone;
    }
}
