<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse\Row;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Amount implements ModelInterface
{
    /** @var string|null $currencyCode */
    private $currencyCode;
    /** @var string|null $value */
    private $value;

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
        $result->currencyCode = $json['currencyCode'] ?? null;
        $result->value = $json['value'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'currencyCode' => $this->getCurrencyCode(),
            'value' => $this->getValue()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Amount &&
            $this->currencyCode === $other->currencyCode &&
            $this->value === $other->value;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function withCurrencyCode(string $currencyCode): Amount
    {
        $clone = clone $this;
        $clone->currencyCode = $currencyCode;
        return $clone;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function withValue(string $value): Amount
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }
}
