<?php

namespace SnowIO\BrightpearlDataModel\SalesCredit;

use SnowIO\BrightpearlDataModel\ModelInterface;
use SnowIO\BrightpearlDataModel\SalesCredit\Delivery\Address;

class Delivery implements ModelInterface
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
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->date = $json['date'] ?? null;
        $result->shippingMethodId = $json['shippingMethodId'] ?? null;
        $result->address = Address::fromJson($json['address'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'date' => $this->getDate(),
            'shippingMethodId' => $this->getShippingMethodId(),
            'address' => $this->getAddress()->toJson()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Delivery &&
            $this->date === $other->date &&
            $this->address->equals($other->address) &&
            $this->shippingMethodId === $other->shippingMethodId;
    }

    public function withDate(string $date): self
    {
        $result = clone $this;
        $result->date = $date;
        return $result;
    }

    public function withAddress(?Address $address): Delivery
    {
        $result = clone $this;
        $result->address = $address;
        return $result;
    }

    public function withShippingMethodId(?int $shippingMethodId): Delivery
    {
        $result = clone $this;
        $result->shippingMethodId = $shippingMethodId;
        return $result;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function getShippingMethodId(): ?int
    {
        return $this->shippingMethodId;
    }
}
