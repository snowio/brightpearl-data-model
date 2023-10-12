<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;
use SnowIO\BrightpearlDataModel\ProductAvailability\Total;

class ProductAvailability implements ModelInterface
{
    /** @var Total|null $total */
    private $total;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }


    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): ModelInterface
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
     * @param ModelInterface $productAvailabilityToCompare
     * @return bool
     */
    public function equals(ModelInterface $productAvailabilityToCompare): bool
    {
        return $this->toJson() === $productAvailabilityToCompare->toJson();
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
