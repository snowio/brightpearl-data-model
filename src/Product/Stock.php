<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\Product\Stock\Dimensions;
use SnowIO\BrightpearlDataModel\Product\Stock\Weight;

class Stock
{
    /** @var bool|null $stockTracked */
    private $stockTracked;
    /** @var Weight|null $weight */
    private $weight;
    /** @var Dimensions|null $dimensions */
    private $dimensions;

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

        $weight = is_array($json['weight']) ? $json['weight'] : [];
        $dimensions = is_array($json['dimensions']) ? $json['dimensions'] : [];

        $result->stockTracked = is_bool($json['stockTracked']) && $json['stockTracked'];
        $result->weight = Weight::fromJson($weight);
        $result->dimensions = Dimensions::fromJson($dimensions);

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $weight = is_null($this->getWeight()) ? [] : $this->getWeight()->toJson();
        $dimensions = is_null($this->getDimensions()) ? [] : $this->getDimensions()->toJson();

        return [
            'stockTracked' => $this->isStockTracked(),
            'weight' => $weight,
            'dimensions' => $dimensions
        ];
    }

    /**
     * @return bool|null
     */
    public function isStockTracked(): ?bool
    {
        return $this->stockTracked;
    }

    /**
     * @param bool $stockTracked
     * @return Stock
     */
    public function withStockTracked(bool $stockTracked): Stock
    {
        $clone = clone $this;
        $clone->stockTracked = $stockTracked;
        return $clone;
    }

    /**
     * @return Weight|null
     */
    public function getWeight(): ?Weight
    {
        return $this->weight;
    }

    /**
     * @param Weight $weight
     * @return Stock
     */
    public function withWeight(Weight $weight): Stock
    {
        $clone = clone $this;
        $clone->weight = $weight;
        return $clone;
    }

    /**
     * @return Dimensions|null
     */
    public function getDimensions(): ?Dimensions
    {
        return $this->dimensions;
    }

    /**
     * @param Dimensions $dimensions
     * @return Stock
     */
    public function withDimensions(Dimensions $dimensions): Stock
    {
        $clone = clone $this;
        $clone->dimensions = $dimensions;
        return $clone;
    }
}
