<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse;

use SnowIO\BrightpearlDataModel\SalesOrderResponse\Customer\Address;

class Delivery
{
    /** @var Address|null $address */
    protected $address;
    /** @var int|null */
    protected $shippingMethodId;

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
        $result->shippingMethodId = is_int($json['shippingMethodId']) ? $json['shippingMethodId'] : null;
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
            'shippingMethodId' => $this->getShippingMethodId(),
            'address' => $address,
        ];
    }

    /**
     * @param Address|null $address
     * @return Delivery
     */
    public function withAddress(?Address $address): Delivery
    {
        $result = clone $this;
        $result->address = $address;
        return $result;
    }

    /**
     * @param int|null $shippingMethodId
     * @return Delivery
     */
    public function withShippingMethodId(?int $shippingMethodId): Delivery
    {
        $result = clone $this;
        $result->shippingMethodId = $shippingMethodId;
        return $result;
    }

    /**
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @return int|null
     */
    public function getShippingMethodId(): ?int
    {
        return $this->shippingMethodId;
    }
}
