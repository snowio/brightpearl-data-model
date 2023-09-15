<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote;

class Shipping
{

    /** @var string|null $reference */
    private $reference;

    /** @var int|null */
    private $boxes;

    /** @var int|null shippingMethodId */
    private $shippingMethodId;

    /** @var string|null $weight */
    private $weight;

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
        $result->reference = is_string($json['reference']) ? $json['reference'] : null;
        $result->boxes = is_int($json['boxes']) ? $json['boxes'] : null;
        $result->shippingMethodId = is_int($json['shippingMethodId']) ? $json['shippingMethodId'] : null;
        $result->weight = is_string($json['weight']) ? $json['weight'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'reference' => $this->getReference(),
            'boxes' => $this->getBoxes(),
            'shippingMethodId' => $this->getShippingMethodId(),
            'weight' => $this->getWeight()
        ];
    }

    /**
     * @param string|null $reference
     * @return Shipping
     */
    public function withReference(?string $reference): Shipping
    {
        $clone = clone $this;
        $clone->reference = $reference;
        return $clone;
    }

    /**
     * @param int|null $boxes
     * @return Shipping
     */
    public function withBoxes(?int $boxes): Shipping
    {
        $clone = clone $this;
        $clone->boxes = $boxes;
        return $clone;
    }

    /**
     * @param int|null $shippingMethodId
     * @return Shipping
     */
    public function withShippingMethodId(?int $shippingMethodId): Shipping
    {
        $clone = clone $this;
        $clone->shippingMethodId = $shippingMethodId;
        return $clone;
    }

    /**
     * @param string|null $weight
     * @return Shipping
     */
    public function withWeight(?string $weight): Shipping
    {
        $clone = clone $this;
        $clone->weight = $weight;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return int|null
     */
    public function getBoxes(): ?int
    {
        return $this->boxes;
    }

    /**
     * @return int|null
     */
    public function getShippingMethodId(): ?int
    {
        return $this->shippingMethodId;
    }

    /**
     * @return string|null
     */
    public function getWeight(): ?string
    {
        return $this->weight;
    }
}
