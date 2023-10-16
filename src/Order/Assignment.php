<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;
use SnowIO\BrightpearlDataModel\Order\Assignment\Current;

class Assignment implements ModelInterface
{
    /** @var Current|null $current */
    private $current;

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
        $result->current = Current::fromJson($json['current']?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'current' => $this->getCurrent() ? $this->getCurrent()->toJson() : []
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Assignment &&
            ($this->getCurrent() && $this->getCurrent()->equals($other->getCurrent()));
    }

    public function getCurrent(): ?Current
    {
        return $this->current;
    }

    public function withCurrent(?Current $current): self
    {
        $clone = clone $this;
        $clone->current = $current;
        return $clone;
    }
}
