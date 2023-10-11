<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

class Customer
{
    /** @var int|null $id */
    private $id;
    /** @var Address */
    private $address;

    public static function create(): self
    {
        return new self();
    }

    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->id = $json['id'] ?? null;
        $result->address = Address::fromJson($json['address'] ?? null);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'address' => $this->address->toJson()
        ];
    }

    public function equals(Customer $customerToCompare): bool
    {
        return $this->getId() === $customerToCompare->getId() &&
            $this->address->equals($customerToCompare->getAddress());
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
