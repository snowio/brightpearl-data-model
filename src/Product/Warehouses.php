<?php

namespace SnowIO\BrightpearlDataModel\Product;

class Warehouses
{
    /** @var int|null $defaultLocationId */
    private $defaultLocationId;
    /** @var int|null $reorderLevel */
    private $reorderLevel;
    /** @var int|null $reorderQuantity */
    private $reorderQuantity;

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

        $result->defaultLocationId = is_numeric($json['defaultLocationId']) ? (int) $json['defaultLocationId'] : null;
        $result->reorderLevel = is_numeric($json['reorderLevel']) ? (int) $json['reorderLevel'] : null;
        $result->reorderQuantity = is_numeric($json['reorderQuantity']) ? (int) $json['reorderQuantity'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'defaultLocationId' => $this->getDefaultLocationId(),
            'reorderLevel' => $this->getReorderLevel(),
            'reorderQuantity' => $this->getReorderQuantity()
        ];
    }

    /**
     * @return int|null
     */
    public function getDefaultLocationId(): ?int
    {
        return $this->defaultLocationId;
    }

    /**
     * @param int|null $defaultLocationId
     * @return Warehouses
     */
    public function withDefaultLocationId(?int $defaultLocationId): Warehouses
    {
        $clone = clone $this;
        $clone->defaultLocationId = $defaultLocationId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getReorderLevel(): ?int
    {
        return $this->reorderLevel;
    }

    /**
     * @param int|null $reorderLevel
     * @return Warehouses
     */
    public function withReorderLevel(?int $reorderLevel): Warehouses
    {
        $clone = clone $this;
        $clone->reorderLevel = $reorderLevel;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getReorderQuantity(): ?int
    {
        return $this->reorderQuantity;
    }

    /**
     * @param int|null $reorderQuantity
     * @return Warehouses
     */
    public function withReorderQuantity(?int $reorderQuantity): Warehouses
    {
        $clone = clone $this;
        $clone->reorderQuantity = $reorderQuantity;
        return $clone;
    }
}
