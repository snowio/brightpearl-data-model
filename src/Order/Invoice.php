<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Invoice implements ModelInterface
{
    /** @var string|null $taxDate */
    private $taxDate;

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
        $result->taxDate = $json['taxDate'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'taxDate' => $this->getTaxDate()
        ];
    }

    public function getTaxDate(): ?string
    {
        return $this->taxDate;
    }

    public function withTaxDate(?string $taxDate): Invoice
    {
        $clone = clone $this;
        $clone->taxDate = $taxDate;
        return $clone;
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Invoice &&
            $this->taxDate === $other->taxDate;
    }
}
