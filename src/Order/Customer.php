<?php

namespace SnowIO\BrightpearlDataModel\Order;

class Customer
{
    /** @var int|null $id */
    private $id;

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
        $result->id = is_numeric($json['id']) ? (int)$json['id'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'id' => $this->getId()
        ];
    }

    /**
     * @param Customer $customerToCompare
     * @return bool
     */
    public function equals(Customer $customerToCompare): bool
    {
        return $this->getId() === $customerToCompare->getId();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Customer
     */
    public function withId(int $id): Customer
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }
}
