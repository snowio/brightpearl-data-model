<?php

namespace SnowIO\BrightpearlDataModel\Product\Stock;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Weight implements ModelInterface
{
    /** @var float|null $magnitude */
    private $magnitude;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->magnitude = $json['magnitude'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'magnitude' => $this->getMagnitude()
        ];
    }

    public function equals($other): bool
    {
        return $other instanceof Weight &&
            $this->magnitude === $other->magnitude;
    }

    public function getMagnitude(): ?float
    {
        return $this->magnitude;
    }

    public function withMagnitude(float $magnitude): Weight
    {
        $clone = clone $this;
        $clone->magnitude = $magnitude;
        return $clone;
    }
}
