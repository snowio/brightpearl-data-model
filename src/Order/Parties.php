<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;
use SnowIO\BrightpearlDataModel\Order\Parties\Delivery;

class Parties implements ModelInterface
{
    /** @var \SnowIO\BrightpearlDataModel\Order\Parties\Delivery|null $delivery
     */
    private $delivery;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $delivery = is_array($json['delivery']) ? $json['delivery'] : [];
        $result = new self();
        $result->delivery = Delivery::fromJson($delivery);
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $delivery = is_null($this->getDelivery()) ? [] : $this->getDelivery()->toJson();
        return [
            'delivery' => $delivery
        ];
    }

    /**
     * @param ModelInterface $partiesToCompare
     * @return bool
     */
    public function equals(ModelInterface $partiesToCompare): bool
    {
        if (!$partiesToCompare instanceof Parties) {
            return false;
        }
        return $this->getDelivery() === $partiesToCompare->getDelivery();
    }

    /**
     * @return Delivery|null
     */
    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    /**
     * @param Delivery|null $delivery
     * @return self
     */
    public function withId(?Delivery $delivery): self
    {
        $clone = clone $this;
        $clone->delivery = $delivery;
        return $clone;
    }
}
