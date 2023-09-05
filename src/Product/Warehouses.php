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
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->defaultLocationId = $json['defaultLocationId'] ?? null;
        $result->reorderLevel = $json['reorderLevel'] ?? null;
        $result->reorderQuantity = $json['reorderQuantity'] ?? null;
        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        if ($this->defaultLocationId) {
            $json['defaultLocationId'] = $this->defaultLocationId;
        }

        if ($this->reorderLevel) {
            $json['reorderLevel'] = $this->reorderLevel;
        }

        if ($this->reorderQuantity) {
            $json['reorderQuantity'] = $this->reorderQuantity;
        }

        return $json;
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
