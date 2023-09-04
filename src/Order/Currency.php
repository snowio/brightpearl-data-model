<?php

namespace SnowIO\BrightpearlDataModel\Order;

class Currency
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
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return self
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->code = is_string($json['code']) ? $json['code'] : null;
        $result->fixedExchangeRate = is_bool($json['fixedExchangeRate']) && $json['fixedExchangeRate'];
        $result->exchangeRate = is_string($json['exchangeRate']) ? $json['exchangeRate'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'code' => $this->getCode(),
            'fixedExchangeRate' => $this->getFixedExchangeRate(),
            'exchangeRate' => $this->getExchangeRate()
        ];
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Currency
     */
    public function withCode(string $code): Currency
    {
        $clone = clone $this;
        $clone->code = $code;
        return $clone;
    }

    /**
     * @return bool|null
     */
    public function getFixedExchangeRate(): ?bool
    {
        return $this->fixedExchangeRate;
    }

    /**
     * @param bool|null $fixedExchangeRate
     * @return Currency
     */
    public function withFixedExchangeRate(?bool $fixedExchangeRate): Currency
    {
        $clone = clone $this;
        $clone->fixedExchangeRate = $fixedExchangeRate;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getExchangeRate(): ?string
    {
        return $this->exchangeRate;
    }

    /**
     * @param string|null $exchangeRate
     * @return Currency
     */
    public function withExchangeRate(?string $exchangeRate): Currency
    {
        $clone = clone $this;
        $clone->exchangeRate = $exchangeRate;
        return $clone;
    }
}
