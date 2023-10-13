<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

use SnowIO\BrightpearlDataModel\ModelInterface;

class State implements ModelInterface
{
    /** @var string|null $tax */
    private $tax;

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
        $result->tax = $json['tax'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'tax' => $this->getTax()
        ];
    }
    public function equals(ModelInterface $other): bool
    {
        return $other instanceof State &&
            $this->tax === $other->tax;
    }

    public function getTax(): ?string
    {
        return $this->tax;
    }

    public function withTax(?string $tax): State
    {
        $clone = clone $this;
        $clone->tax = $tax;
        return $clone;
    }
}
