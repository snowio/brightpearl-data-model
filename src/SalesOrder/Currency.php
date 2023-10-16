<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Currency implements ModelInterface
{
    /** @var string|null $code */
    private $code;
    /** @var bool|null $fixedExchangeRate */
    private $fixedExchangeRate;
    /** @var string|null $exchangeRate */
    private $exchangeRate;

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
        $result->code = $json['code'] ?? null;
        $result->fixedExchangeRate = $json['fixedExchangeRate'] ?? null;
        $result->exchangeRate = $json['exchangeRate'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'code' => $this->getCode(),
            'fixedExchangeRate' => $this->getFixedExchangeRate(),
            'exchangeRate' => $this->getExchangeRate()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Currency &&
            $this->code === $other->code &&
            $this->fixedExchangeRate === $other->fixedExchangeRate &&
            $this->exchangeRate === $other->exchangeRate;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function withCode(string $code): Currency
    {
        $clone = clone $this;
        $clone->code = $code;
        return $clone;
    }

    public function getFixedExchangeRate(): ?bool
    {
        return $this->fixedExchangeRate;
    }

    public function withFixedExchangeRate(?bool $fixedExchangeRate): Currency
    {
        $clone = clone $this;
        $clone->fixedExchangeRate = $fixedExchangeRate;
        return $clone;
    }

    public function getExchangeRate(): ?string
    {
        return $this->exchangeRate;
    }

    public function withExchangeRate(?string $exchangeRate): Currency
    {
        $clone = clone $this;
        $clone->exchangeRate = $exchangeRate;
        return $clone;
    }
}
