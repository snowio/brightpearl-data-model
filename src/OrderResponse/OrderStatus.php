<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

class OrderStatus
{
    /** @var int|null $orderStatusId */
    private $orderStatusId;
    /** @var string|null $name */
    private $name;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->orderStatusId = is_numeric($json['orderStatusId']) ? (int)$json['orderStatusId'] : null;
        $result->name = is_string($json['name']) ? $json['name'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'orderStatusId' => $this->getOrderStatusId(),
            'name' => $this->getName(),
        ];
    }

    /**
     * @return int|null
     */
    public function getOrderStatusId(): ?int
    {
        return $this->orderStatusId;
    }

    /**
     * @param int $orderStatusId
     * @return OrderStatus
     */
    public function withOrderStatusId(int $orderStatusId): OrderStatus
    {
        $clone = clone $this;
        $clone->orderStatusId = $orderStatusId;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return OrderStatus
     */
    public function withName(string $name): OrderStatus
    {
        $clone = clone $this;
        $clone->name = $name;
        return $clone;
    }
}
