<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse;

use SnowIO\BrightpearlDataModel\SalesOrderResponse\Customer\Address;

class Billing
{
    /** @var int|null $contactId */
    private $contactId;

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
        $result->contactId = is_int($json['contactId']) ? $json['contactId'] : null;
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
            'contactId' => $this->getContactId(),
            'address' => $address
        ];
    }

    /**
     * @param int|null $contactId
     * @return Billing
     */
    public function withContactId(?int $contactId): Billing
    {
        $result = clone $this;
        $result->contactId = $contactId;
        return $result;
    }

    /**
     * @param Address|null $address
     * @return Billing
     */
    public function withAddress(?Address $address): Billing
    {
        $result = clone $this;
        $result->address = $address;
        return $result;
    }

    /**
     * @return int|null
     */
    public function getContactId(): ?int
    {
        return $this->contactId;
    }

    /**
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }
}
