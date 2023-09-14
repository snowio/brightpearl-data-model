<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

class TotalValue
{
    /** @var string|null $net */
    private $net;
    /** @var string|null $taxAmount */
    private $taxAmount;
    /** @var string|null $baseNet */
    private $baseNet;
    /** @var string|null $baseTaxAmount */
    private $baseTaxAmount;
    /** @var string|null $baseTotal */
    private $baseTotal;
    /** @var string|null $total */
    private $total;

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

        $result->net = is_string($json['net']) ? $json['net'] : null;
        $result->taxAmount = is_string($json['taxAmount']) ? $json['taxAmount'] : null;
        $result->baseNet = is_string($json['baseNet']) ? $json['baseNet'] : null;
        $result->baseTaxAmount = is_string($json['baseTaxAmount']) ? $json['baseTaxAmount'] : null;
        $result->baseTotal = is_string($json['baseTotal']) ? $json['baseTotal'] : null;
        $result->total = is_string($json['total']) ? $json['total'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'net' => $this->getNet(),
            'taxAmount' => $this->getTaxAmount(),
            'baseNet' => $this->getBaseNet(),
            'baseTaxAmount' => $this->getBaseTaxAmount(),
            'baseTotal' => $this->getBaseTotal(),
            'total' => $this->getTotal()
        ];
    }

    /**
     * @return string|null
     */
    public function getNet(): ?string
    {
        return $this->net;
    }

    /**
     * @param string|null $net
     * @return $this
     */
    public function withNet(?string $net): TotalValue
    {
        $clone = clone $this;
        $clone->net = $net;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTaxAmount(): ?string
    {
        return $this->taxAmount;
    }

    /**
     * @param string|null $taxAmount
     * @return $this
     */
    public function withTaxAmount(?string $taxAmount): TotalValue
    {
        $clone = clone $this;
        $clone->taxAmount = $taxAmount;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getBaseNet(): ?string
    {
        return $this->baseNet;
    }

    /**
     * @param string|null $baseNet
     * @return $this
     */
    public function withBaseNet(?string $baseNet): TotalValue
    {
        $clone = clone $this;
        $clone->baseNet = $baseNet;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getBaseTaxAmount(): ?string
    {
        return $this->baseTaxAmount;
    }

    /**
     * @param string|null $baseTaxAmount
     * @return $this
     */
    public function withBaseTaxAmount(?string $baseTaxAmount): TotalValue
    {
        $clone = clone $this;
        $clone->baseTaxAmount = $baseTaxAmount;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getBaseTotal(): ?string
    {
        return $this->baseTotal;
    }

    /**
     * @param string|null $baseTotal
     * @return $this
     */
    public function withBaseTotal(?string $baseTotal): TotalValue
    {
        $clone = clone $this;
        $clone->baseTotal = $baseTotal;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTotal(): ?string
    {
        return $this->total;
    }

    /**
     * @param string|null $total
     * @return $this
     */
    public function withTotal(?string $total): TotalValue
    {
        $clone = clone $this;
        $clone->total = $total;
        return $clone;
    }
}
