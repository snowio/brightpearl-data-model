<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Status implements ModelInterface
{
    /** @var int|null $id */
    private $id;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->id = $json['orderStatusId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'orderStatusId' => $this->getId(),
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Status &&
            $this->id === $other->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function withId(?int $id): self
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }
}
