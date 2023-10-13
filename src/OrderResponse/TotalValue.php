<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

use SnowIO\BrightpearlDataModel\ModelInterface;

class TotalValue implements ModelInterface
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
        $result->net = $json['net'] ?? null;
        $result->taxAmount = $json['taxAmount'] ?? null;
        $result->baseNet = $json['baseNet'] ?? null;
        $result->baseTaxAmount = $json['baseTaxAmount'] ?? null;
        $result->baseTotal = $json['baseTotal'] ?? null;
        $result->total = $json['total'] ?? null;
        return $result;
    }

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

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof TotalValue &&
            $this->net === $other->net &&
            $this->taxAmount === $other->taxAmount &&
            $this->baseNet === $other->baseNet &&
            $this->baseTaxAmount === $other->baseTaxAmount &&
            $this->baseTotal === $other->baseTotal &&
            $this->total === $other->total;
    }

    public function getNet(): ?string
    {
        return $this->net;
    }

    public function withNet(?string $net): TotalValue
    {
        $clone = clone $this;
        $clone->net = $net;
        return $clone;
    }

    public function getTaxAmount(): ?string
    {
        return $this->taxAmount;
    }

    public function withTaxAmount(?string $taxAmount): TotalValue
    {
        $clone = clone $this;
        $clone->taxAmount = $taxAmount;
        return $clone;
    }

    public function getBaseNet(): ?string
    {
        return $this->baseNet;
    }

    public function withBaseNet(?string $baseNet): TotalValue
    {
        $clone = clone $this;
        $clone->baseNet = $baseNet;
        return $clone;
    }

    public function getBaseTaxAmount(): ?string
    {
        return $this->baseTaxAmount;
    }

    public function withBaseTaxAmount(?string $baseTaxAmount): TotalValue
    {
        $clone = clone $this;
        $clone->baseTaxAmount = $baseTaxAmount;
        return $clone;
    }

    public function getBaseTotal(): ?string
    {
        return $this->baseTotal;
    }

    public function withBaseTotal(?string $baseTotal): TotalValue
    {
        $clone = clone $this;
        $clone->baseTotal = $baseTotal;
        return $clone;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function withTotal(?string $total): TotalValue
    {
        $clone = clone $this;
        $clone->total = $total;
        return $clone;
    }
}
