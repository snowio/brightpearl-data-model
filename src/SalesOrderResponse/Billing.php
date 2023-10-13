<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse;

use SnowIO\BrightpearlDataModel\ModelInterface;
use SnowIO\BrightpearlDataModel\SalesOrderResponse\Customer\Address;

class Billing implements ModelInterface
{
    /** @var int|null $contactId */
    private $contactId;
    /** @var Address|null $address */
    private $address;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->contactId = $json['contactId'] ?? null;
        $result->address = Address::fromJson($json['address'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'contactId' => $this->getContactId(),
            'address' => $this->getAddress()->toJson()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Billing &&
            $this->contactId === $other->contactId &&
            $this->address->equals($other->address);
    }

    public function getContactId(): ?int
    {
        return $this->contactId;
    }

    public function withContactId(?int $contactId): Billing
    {
        $clone = clone $this;
        $clone->contactId = $contactId;
        return $clone;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function withAddress(?Address $address): Billing
    {
        $clone = clone $this;
        $clone->address = $address;
        return $clone;
    }
}
