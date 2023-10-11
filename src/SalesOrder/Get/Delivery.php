<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder\Get;

use SnowIO\BrightpearlDataModel\SalesOrder\Address;

class Delivery
{
    /** @var Address */
    private $address;
    /** @var int|null $shippingMethodId */
    private $shippingMethodId;

    public static function create(): self
    {
        $delivery = new self();
        $delivery->address = Address::create();
        return $delivery;
    }

    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->address = Address::fromJson($json['address'] ?? []);
        $result->shippingMethodId = $json['shippingMethodId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'address' => $this->getAddress()->toJson(),
            'shippingMethodId' => $this->getShippingMethodId()
        ];
    }

    public function equals(Delivery $deliveryToCompare): bool
    {
        return ($this->getShippingMethodId() === $deliveryToCompare->getShippingMethodId()) &&
            ($this->getAddress()->equals($deliveryToCompare->getAddress()));
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function withAddress(Address $address): self
    {
        $clone = clone $this;
        $clone->address = $address;
        return $clone;
    }

    public function getShippingMethodId(): ?int
    {
        return $this->shippingMethodId;
    }

    public function withShippingMethodId(?int $shippingMethodId): self
    {
        $clone = clone $this;
        $clone->shippingMethodId = $shippingMethodId;
        return $clone;
    }
}
