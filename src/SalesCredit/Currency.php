<?php

namespace SnowIO\BrightpearlDataModel\SalesCredit;

class Currency
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
        $result->fixedExchangeRate = is_bool($json["fixedExchangeRate"]) ? $json["fixedExchangeRate"] : null;
        $result->exchangeRate = is_string($json["exchangeRate"]) ? $json["exchangeRate"] : null;
        $result->code = is_string($json["code"]) ? $json["code"] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            "fixedExchangeRate" => $this->getFixedExchangeRate(),
            "exchangeRate" => $this->getExchangeRate(),
            "code" => $this->getCode()
        ];
    }

    /**
     * @param string|null $code
     * @return Currency
     */
    public function withCode(?string $code): Currency
    {
        $result = clone $this;
        $result->code = $code;
        return $result;
    }

    /**
     * @param bool|null $fixedExchangeRate
     * @return Currency
     */
    public function withFixedExchangeRate(?bool $fixedExchangeRate): Currency
    {
        $result = clone $this;
        $result->fixedExchangeRate = $fixedExchangeRate;
        return $result;
    }

    /**
     * @param string|null $exchangeRate
     * @return Currency
     */
    public function withExchangeRate(?string $exchangeRate): Currency
    {
        $result = clone $this;
        $result->exchangeRate = $exchangeRate;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @return bool|null
     */
    public function getFixedExchangeRate(): ?bool
    {
        return $this->fixedExchangeRate;
    }

    /**
     * @return string|null
     */
    public function getExchangeRate(): ?string
    {
        return $this->exchangeRate;
    }
}
