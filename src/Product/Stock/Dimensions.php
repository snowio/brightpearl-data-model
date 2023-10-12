<?php

namespace SnowIO\BrightpearlDataModel\Product\Stock;

class Dimensions
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

        $result->length = is_numeric($json['length']) ? (float) $json['length'] : null;
        $result->height = is_numeric($json['height']) ? (float) $json['height'] : null;
        $result->width = is_numeric($json['width']) ? (float) $json['width'] : null;
        $result->volume = is_numeric($json['volume']) ? (float) $json['volume'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
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

    /**
     * @return float|null
     */
    public function getLength(): ?float
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
     * @return float|null
     */
    public function getHeight(): ?float
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
     * @return float|null
     */
    public function getWidth(): ?float
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
     * @return float|null
     */
    public function getVolume(): ?float
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
