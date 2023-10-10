<?php

namespace SnowIO\BrightpearlDataModel\Order;

class Delivery
{
    /** @var string|null $date */
    private $date;
    /** @var int|null $shippingMethodId */
    private $shippingMethodId;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return self
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->date = is_string($json['deliveryDate']) ? $json['deliveryDate'] : null;
        $result->shippingMethodId = is_numeric($json['shippingMethodId']) ? (int)$json['shippingMethodId'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'date' => $this->getDate(),
            'shippingMethodId' => $this->getShippingMethodId()
        ];
    }

    /**
     * @param Delivery $deliveryToCompare
     * @return bool
     */
    public function equals(Delivery $deliveryToCompare): bool
    {
        if ($this->getDate() !== $deliveryToCompare->getDate()) {
            return false;
        }
        return $this->getShippingMethodId() === $deliveryToCompare->getShippingMethodId();
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     * @return Delivery
     */
    public function withDate(?string $date): Delivery
    {
        $clone = clone $this;
        $clone->date = $date;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getShippingMethodId(): ?int
    {
        return $this->shippingMethodId;
    }

    /**
     * @param int|null $shippingMethodId
     * @return Delivery
     */
    public function withShippingMethodId(?int $shippingMethodId): Delivery
    {
        $clone = clone $this;
        $clone->shippingMethodId = $shippingMethodId;
        return $clone;
    }
}
