<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

use SnowIO\BrightpearlDataModel\Address;
use SnowIO\BrightpearlDataModel\ModelInterface;

class Delivery implements ModelInterface
{
    /** @var Address */
    private $address;
    /** @var int|null $shippingMethodId */
    private $shippingMethodId;
    /** @var string|null $date */
    private $date;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    private function __construct()
    {
        $this->address = Address::create();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->address = Address::fromJson($json['address'] ?? []);
        $result->shippingMethodId = $json['shippingMethodId'] ?? null;
        $result->date = $json['date'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'address' => $this->getAddress()->toJson(),
            'shippingMethodId' => $this->getShippingMethodId(),
            'date' => $this->getDate()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Delivery &&
            $this->shippingMethodId === $other->shippingMethodId &&
            $this->getAddress()->equals($other->getAddress());
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

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function withDate(?string $date): self
    {
        $clone = clone $this;
        $clone->date = $date;
        return $clone;
    }
}
