<?php

namespace SnowIO\BrightpearlDataModel\Product;

use Online4Baby\Brightpearl\Product\Stock\Weight;
use Online4Baby\Brightpearl\Product\Stock\Dimensions;

class Stock
{
    /** @var bool $stockTracked */
    private $stockTracked;
    /** @var Weight $weight */
    private $weight;
    /** @var Dimensions $dimensions */
    private $dimensions;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->stockTracked = $json['stockTracked'];
        $result->weight = Weight::fromJson($json['weight']);
        $result->dimensions = Dimensions::fromJson($json['dimensions']);

        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        $json['stockTracked'] = $this->stockTracked;
        $json['weight'] = $this->weight->toJson();
        $json['dimensions'] = $this->dimensions->toJson();

        return $json;
    }

    /**
     * @return bool
     */
    public function isStockTracked(): bool
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
     * @return Weight
     */
    public function getWeight(): Weight
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
     * @return Dimensions
     */
    public function getDimensions(): Dimensions
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
