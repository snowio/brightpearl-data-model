<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\ProductAvailability\Total;

class ProductAvailability
{
    /** @var Total|null $total */
    private $total;

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
        $result->total = Total::fromJson(is_array($json['total']) ? $json['total'] : []);
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $total = is_null($this->getTotal()) ? [] : $this->getTotal()->toJson();
        $json = [];
        $json['total'] = $total;
        return $json;
    }

    /**
     * @return Total|null
     */
    public function getTotal(): ?Total
    {
        return $this->total;
    }

    /**
     * @param Total|null $total
     * @return ProductAvailability
     */
    public function withTotal(?Total $total): ProductAvailability
    {
        $clone = clone $this;
        $clone->total = $total;
        return $clone;
    }
}
