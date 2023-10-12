<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Shipping implements ModelInterface
{
    /** @var string|null $reference */
    private $reference;
    /** @var int|null */
    private $boxes;
    /** @var int|null shippingMethodId */
    private $shippingMethodId;
    /** @var string|null $weight */
    private $weight;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->reference = $json['reference'] ?? null;
        $result->boxes = $json['boxes'] ?? null;
        $result->shippingMethodId = $json['shippingMethodId'] ?? null;
        $result->weight = $json['weight'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'reference' => $this->getReference(),
            'boxes' => $this->getBoxes(),
            'shippingMethodId' => $this->getShippingMethodId(),
            'weight' => $this->getWeight()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Shipping &&
            $this->reference === $other->reference &&
            $this->boxes === $other->boxes &&
            $this->shippingMethodId === $other->shippingMethodId &&
            $this->weight === $other->weight;
    }

    public function withReference(?string $reference): Shipping
    {
        $clone = clone $this;
        $clone->reference = $reference;
        return $clone;
    }

    public function withBoxes(?int $boxes): Shipping
    {
        $clone = clone $this;
        $clone->boxes = $boxes;
        return $clone;
    }

    public function withShippingMethodId(?int $shippingMethodId): Shipping
    {
        $clone = clone $this;
        $clone->shippingMethodId = $shippingMethodId;
        return $clone;
    }

    public function withWeight(?string $weight): Shipping
    {
        $clone = clone $this;
        $clone->weight = $weight;
        return $clone;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function getBoxes(): ?int
    {
        return $this->boxes;
    }

    public function getShippingMethodId(): ?int
    {
        return $this->shippingMethodId;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }
}
