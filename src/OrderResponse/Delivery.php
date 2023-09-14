<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

class Delivery
{
    /** @var string|null $deliveryDate */
    private $deliveryDate;
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
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->deliveryDate = is_string($json['deliveryDate']) ? $json['deliveryDate'] : null;
        $result->shippingMethodId = is_numeric($json['shippingMethodId']) ? (int)$json['shippingMethodId'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'deliveryDate' => $this->getDeliveryDate(),
            'shippingMethodId' => $this->getShippingMethodId()
        ];
    }

    /**
     * @return string|null
     */
    public function getDeliveryDate(): ?string
    {
        return $this->deliveryDate;
    }

    /**
     * @param string|null $deliveryDate
     * @return Delivery
     */
    public function withDeliveryDate(?string $deliveryDate): Delivery
    {
        $clone = clone $this;
        $clone->deliveryDate = $deliveryDate;
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
