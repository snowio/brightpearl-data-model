<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\ModelInterface;
use SnowIO\BrightpearlDataModel\Product\Stock\Dimensions;
use SnowIO\BrightpearlDataModel\Product\Stock\Weight;

class Stock implements ModelInterface
{
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
        $result->stockTracked = $json['stockTracked'];
        $result->weight = Weight::fromJson($json['weight'] ?? []);
        $result->dimensions = Dimensions::fromJson($json['dimensions'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'stockTracked' => $this->isStockTracked(),
            'weight' => $this->getWeight()->toJson(),
            'dimensions' => $this->getDimensions()->toJson()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Stock &&
            $this->stockTracked === $other->stockTracked &&
            $this->weight->equals($other->weight) &&
            $this->dimensions->equals($other->dimensions);
    }

    /** @var bool|null $stockTracked */
    private $stockTracked;
    /** @var Weight|null $weight */
    private $weight;
    /** @var Dimensions|null $dimensions */
    private $dimensions;

    public function isStockTracked(): ?bool
    {
        return $this->stockTracked;
    }

    public function withStockTracked(bool $stockTracked): Stock
    {
        $clone = clone $this;
        $clone->stockTracked = $stockTracked;
        return $clone;
    }

    public function getWeight(): ?Weight
    {
        return $this->weight;
    }

    public function withWeight(Weight $weight): Stock
    {
        $clone = clone $this;
        $clone->weight = $weight;
        return $clone;
    }

    public function getDimensions(): ?Dimensions
    {
        return $this->dimensions;
    }

    public function withDimensions(Dimensions $dimensions): Stock
    {
        $clone = clone $this;
        $clone->dimensions = $dimensions;
        return $clone;
    }
}
