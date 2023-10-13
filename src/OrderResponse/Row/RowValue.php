<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse\Row;

use SnowIO\BrightpearlDataModel\ModelInterface;

class RowValue implements ModelInterface
{
    /** @var string|null $taxRate */
    private $taxRate;
    /** @var string|null $taxCode */
    private $taxCode;
    /** @var string|null $taxCalculator */
    private $taxCalculator;
    /** @var Amount|null $rowNet */
    private $rowNet;
    /** @var Amount|null $rowTax */
    private $rowTax;
    /** @var int|null $taxClassId */
    private $taxClassId;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->taxRate = $json['taxRate'] ?? null;
        $result->taxCode = $json['taxCode'] ?? null;
        $result->taxCalculator = $json['taxCalculator'] ?? null;
        $result->rowNet = Amount::fromJson($json['rowNet'] ?? []);
        $result->rowTax = Amount::fromJson($json['rowTax'] ?? []);
        $result->taxClassId = $json['taxClassId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'taxRate' => $this->getTaxRate(),
            'taxCode' => $this->getTaxCode(),
            'taxCalculator' => $this->getTaxCalculator(),
            'rowNet' => $this->getRowNet()->toJson(),
            'rowTax' => $this->getRowTax()->toJson(),
            'taxClassId' => $this->getTaxClassId()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof RowValue &&
            $this->taxRate === $other->taxRate &&
            $this->taxCode === $other->taxCode &&
            $this->taxCalculator === $other->taxCalculator &&
            $this->rowNet->equals($other->rowNet) &&
            $this->rowTax->equals($other->rowTax) &&
            $this->taxClassId === $other->taxClassId;
    }

    public function getTaxRate(): ?string
    {
        return $this->taxRate;
    }

    public function withTaxRate(string $taxRate): RowValue
    {
        $clone = clone $this;
        $clone->taxRate = $taxRate;
        return $clone;
    }

    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    public function withTaxCode(string $taxCode): RowValue
    {
        $clone = clone $this;
        $clone->taxCode = $taxCode;
        return $clone;
    }

    public function getTaxCalculator(): ?string
    {
        return $this->taxCalculator;
    }

    public function withTaxCalculator(string $taxCalculator): RowValue
    {
        $clone = clone $this;
        $clone->taxCalculator = $taxCalculator;
        return $clone;
    }

    public function getRowNet(): ?Amount
    {
        return $this->rowNet;
    }

    public function withRowNet(Amount $rowNet): RowValue
    {
        $clone = clone $this;
        $clone->rowNet = $rowNet;
        return $clone;
    }

    public function getRowTax(): ?Amount
    {
        return $this->rowTax;
    }

    public function withRowTax(Amount $rowTax): RowValue
    {
        $clone = clone $this;
        $clone->rowTax = $rowTax;
        return $clone;
    }

    public function getTaxClassId(): ?int
    {
        return $this->taxClassId;
    }

    public function withTaxClassId(int $taxClassId): RowValue
    {
        $clone = clone $this;
        $clone->taxClassId = $taxClassId;
        return $clone;
    }
}
