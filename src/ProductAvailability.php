<?php

namespace SnowIO\BrightpearlDataModel;

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

    private function __construct()
    {
        $this->total = Total::create();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->total = Total::fromJson($json['total'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'total' => $this->getTotal() ? $this->getTotal()->toJson() : null
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof ProductAvailability &&
            $this->total->equals($other->total);
    }

    public function getTotal(): ?Total
    {
        return $this->total;
    }

    public function withTotal(?Total $total): ProductAvailability
    {
        $clone = clone $this;
        $clone->total = $total;
        return $clone;
    }
}
