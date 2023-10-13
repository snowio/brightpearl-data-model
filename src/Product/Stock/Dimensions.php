<?php

namespace SnowIO\BrightpearlDataModel\Product\Stock;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Dimensions implements ModelInterface
{
    /** @var float|null $length */
    private $length;
    /** @var float|null $height */
    private $height;
    /** @var float|null $width */
    private $width;
    /** @var float|null $volume */
    private $volume;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->length = $json['length']?? null;
        $result->height =$json['height'] ?? null;
        $result->width = $json['width'] ?? null;
        $result->volume = $json['volume'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'length' => $this->getLength(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth(),
            'volume' => $this->getVolume(),
        ];
    }

    public function equals($other): bool
    {
        return $other instanceof Dimensions &&
            $this->length === $other->length &&
            $this->height === $other->height &&
            $this->width === $other->width &&
            $this->volume === $other->volume;
    }

    public function getLength(): ?float
    {
        return $this->length;
    }

    public function withLength(float $length): Dimensions
    {
        $clone = clone $this;
        $clone->length = $length;
        return $clone;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function withHeight(float $height): Dimensions
    {
        $clone = clone $this;
        $clone->height = $height;
        return $clone;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function withWidth(float $width): Dimensions
    {
        $clone = clone $this;
        $clone->width = $width;
        return $clone;
    }

    public function getVolume(): ?float
    {
        return $this->volume;
    }

    public function withVolume(float $volume): Dimensions
    {
        $clone = clone $this;
        $clone->volume = $volume;
        return $clone;
    }
}
