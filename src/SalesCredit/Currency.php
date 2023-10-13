<?php

namespace SnowIO\BrightpearlDataModel\SalesCredit;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Currency implements ModelInterface
{
    /** @var bool|null $fixedExchangeRate */
    private $fixedExchangeRate;
    /** @var string|null $exchangeRate */
    private $exchangeRate;
    /** @var string|null $code */
    private $code;

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
        $result->code = $json['code'] ?? null;
        $result->fixedExchangeRate = $json['fixedExchangeRate'] ?? null;
        $result->exchangeRate = $json['exchangeRate'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            "fixedExchangeRate" => $this->getFixedExchangeRate(),
            "exchangeRate" => $this->getExchangeRate(),
            "code" => $this->getCode()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Currency &&
            $this->code === $other->code &&
            $this->fixedExchangeRate === $other->fixedExchangeRate &&
            $this->exchangeRate === $other->exchangeRate;
    }

    public function withCode(?string $code): Currency
    {
        $result = clone $this;
        $result->code = $code;
        return $result;
    }

    public function withFixedExchangeRate(?bool $fixedExchangeRate): Currency
    {
        $result = clone $this;
        $result->fixedExchangeRate = $fixedExchangeRate;
        return $result;
    }

    public function withExchangeRate(?string $exchangeRate): Currency
    {
        $result = clone $this;
        $result->exchangeRate = $exchangeRate;
        return $result;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getFixedExchangeRate(): ?bool
    {
        return $this->fixedExchangeRate;
    }

    public function getExchangeRate(): ?string
    {
        return $this->exchangeRate;
    }
}
