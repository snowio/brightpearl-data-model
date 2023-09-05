<?php

namespace SnowIO\BrightpearlDataModel\Product\Stock;

class Dimensions
{
    /** @var float $length */
    private $length;
    /** @var float $height */
    private $height;
    /** @var float $width */
    private $width;
    /** @var float $volume */
    private $volume;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->length = $json['length'];
        $result->height = $json['height'];
        $result->width = $json['width'];
        $result->volume = $json['volume'];
        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        $json['length'] = $this->length;
        $json['height'] = $this->height;
        $json['width'] = $this->width;
        $json['volume'] = $this->volume;

        return $json;
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @param float $length
     * @return Dimensions
     */
    public function withLength(float $length): Dimensions
    {
        $clone = clone $this;
        $clone->length = $length;
        return $clone;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @return Dimensions
     */
    public function withHeight(float $height): Dimensions
    {
        $clone = clone $this;
        $clone->height = $height;
        return $clone;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @return Dimensions
     */
    public function withWidth(float $width): Dimensions
    {
        $clone = clone $this;
        $clone->width = $width;
        return $clone;
    }

    /**
     * @return float
     */
    public function getVolume(): float
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     * @return Dimensions
     */
    public function withVolume(float $volume): Dimensions
    {
        $clone = clone $this;
        $clone->volume = $volume;
        return $clone;
    }
}
