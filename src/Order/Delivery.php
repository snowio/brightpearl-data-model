<?php

namespace SnowIO\BrightpearlDataModel\Order;

class Delivery
{
    /** @var string|null $date */
    private $date;
    /** @var Address|null */
    private $address;
    /** @var int|null $shippingMethodId */
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
        $address = is_array($json['address']) ? $json['address'] : [];
        $result->date = is_string($json['date']) ? $json['date'] : null;
        $result->address = Address::fromJson($address);
        $result->shippingMethodId = is_numeric($json['shippingMethodId']) ? (int)$json['shippingMethodId'] : null;
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
            'address' => $address,
            'shippingMethodId' => $this->getShippingMethodId()
        ];
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     * @return Delivery
     */
    public function withDate(?string $date): Delivery
    {
        $clone = clone $this;
        $clone->date = $date;
        return $clone;
    }

    /**
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Delivery
     */
    public function withAddress(Address $address): Delivery
    {
        $clone = clone $this;
        $clone->address = $address;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getShippingMethodId(): ?int
    {
        return $this->shippingMethodId;
    }

    /**
     * @param int|null $shippingMethodId
     * @return Delivery
     */
    public function withShippingMethodId(?int $shippingMethodId): Delivery
    {
        $clone = clone $this;
        $clone->shippingMethodId = $shippingMethodId;
        return $clone;
    }
}
