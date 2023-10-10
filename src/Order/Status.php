<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;

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

    /**
     * @param array<string, mixed> $json
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->id = is_numeric($json['orderStatusId']) ? (int)$json['orderStatusId'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'orderStatusId' => $this->getId(),
        ];
    }

    /**
     * @param ModelInterface $statusToCompare
     * @return bool
     */
    public function equals(ModelInterface $statusToCompare): bool
    {
        if (!$statusToCompare instanceof Status) {
            return false;
        }
        return $this->getId() === $statusToCompare->getId();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return self
     */
    public function withId(?int $id): self
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

}
