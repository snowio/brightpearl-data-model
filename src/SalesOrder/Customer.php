<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Customer implements ModelInterface
{
    /** @var int|null $id */
    private $id;
    /** @var Address */
    private $address;

    public function __construct()
    {
        $this->address = Address::create();
    }

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->id = $json['id'] ?? null;
        $result->address = Address::fromJson($json['address'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'address' => $this->address->hasData() ? $this->address->toJson() : null
        ];
    }

    public function equals($other): bool
    {
        return $this->getId() === $other->getId() &&
            $this->address->equals($other->getAddress());
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function withId(int $id): Customer
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }
}
