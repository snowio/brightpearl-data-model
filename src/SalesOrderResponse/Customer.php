<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse;

use SnowIO\BrightpearlDataModel\SalesOrderResponse\Customer\Address;

class Customer
{
    /** @var int|null $id */
    private $id;

    /** @var Address|null $address */
    private $address;

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
        $result->id = is_int($json['id']) ? $json['id'] : null;
        $result->address = Address::fromJson(is_array($json['address']) ? $json['address'] : []);
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $address = is_null($this->getAddress()) ? [] : $this->getAddress()->toJson();
        return [
            'id' => $this->getId(),
            'address' => $address
        ];
    }

    /**
     * @param int|null $id
     * @return $this
     */
    public function withId(?int $id): Customer
    {
        $result = clone $this;
        $result->id = $id;
        return $result;
    }

    /**
     * @param Address|null $address
     * @return $this
     */
    public function withAddress(?Address $address): Customer
    {
        $result = clone $this;
        $result->address = $address;
        return $result;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }
}