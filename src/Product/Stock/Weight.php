<?php

namespace SnowIO\BrightpearlDataModel\Product\Stock;

class Weight
{
    /** @var float $magnitude */
    private $magnitude;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->magnitude = $json['magnitude'];
        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];
        $json['magnitude'] = $this->magnitude;
        return $json;
    }

    /**
     * @return float
     */
    public function getMagnitude(): float
    {
        return $this->magnitude;
    }

    /**
     * @param float $magnitude
     * @return Weight
     */
    public function withMagnitude(float $magnitude): Weight
    {
        $clone = clone $this;
        $clone->magnitude = $magnitude;
        return $clone;
    }
}
