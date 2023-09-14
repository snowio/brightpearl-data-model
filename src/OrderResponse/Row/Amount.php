<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse\Row;

class Amount
{
    /** @var string|null $currencyCode */
    private $currencyCode;
    /** @var string|null $value */
    private $value;

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

        $result->currencyCode = is_string($json['currencyCode']) ? $json['currencyCode'] : null;
        $result->value = is_string($json['value']) ? $json['value'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'currencyCode' => $this->getCurrencyCode(),
            'value' => $this->getValue()
        ];
    }

    /**
     * @return string|null
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    /**
     * @param string $currencyCode
     * @return Amount
     */
    public function withCurrencyCode(string $currencyCode): Amount
    {
        $clone = clone $this;
        $clone->currencyCode = $currencyCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Amount
     */
    public function withValue(string $value): Amount
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }
}
