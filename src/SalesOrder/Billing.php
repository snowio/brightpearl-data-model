<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

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
        $result->contactId = isset($json['contactId']) ? $json['contactId'] : null;
        $result->address = isset($json['address']) ? Address::fromJson($json['address'] ?? []) : null;
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
     * @param Billing $billingToCompare
     * @return bool
     */
    public function equals(Billing $billingToCompare): bool
    {
        if (is_null($this->getAddress()) && is_null($billingToCompare->getAddress())) {
            return $this->getContactId() === $billingToCompare->getContactId();
        }
        if (is_null($this->getAddress())) {
            return false;
        }
        if (is_null($billingToCompare->getAddress())) {
            return false;
        }
        if ($this->getAddress()->equals($billingToCompare->getAddress())) {
            return $this->getContactId() === $billingToCompare->getContactId();
        }

        return false;
    }

    /**
     * @return int|null
     */
    public function getContactId(): ?int
    {
        return $this->contactId;
    }

    /**
     * @param int|null $contactId
     * @return Billing
     */
    public function withContactId(?int $contactId): Billing
    {
        $clone = clone $this;
        $clone->contactId = $contactId;
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
     * @param Address|null $address
     * @return Billing
     */
    public function withAddress(?Address $address): Billing
    {
        $clone = clone $this;
        $clone->address = $address;
        return $clone;
    }
}
