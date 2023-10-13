<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse\Row;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Quantity implements ModelInterface
{
    /** @var string|null $magnitude */
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

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Quantity &&
            $this->magnitude === $other->magnitude;
    }

    public function getMagnitude(): ?string
    {
        return $this->magnitude;
    }

    public function withMagnitude(string $magnitude): Quantity
    {
        $clone = clone $this;
        $clone->magnitude = $magnitude;
        return $clone;
    }
}
