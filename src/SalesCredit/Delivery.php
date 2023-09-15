<?php

namespace SnowIO\BrightpearlDataModel\SalesCredit;

use SnowIO\BrightpearlDataModel\SalesCredit\Delivery\Address;

class Delivery
{
    /** @var Address|null $address */
    private $address;
    /** @var string|null $date */
    private $date;
    /** @var int|null */
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
     * @return self
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->date = is_string($json['date']) ? $json['date'] : null;
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
            'date' => $this->getDate(),
            'shippingMethodId' => $this->getShippingMethodId(),
            'address' => $address,
        ];
    }

    /**
     * @param string $date
     * @return $this
     */
    public function withDate(string $date): self
    {
        $result = clone $this;
        $result->date = $date;
        return $result;
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
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
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
