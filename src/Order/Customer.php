<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Customer implements ModelInterface
{
    /** @var int|null $id */
    private $id;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->id = $json['id'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getId()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Customer &&
            $this->id === $other->id;
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
