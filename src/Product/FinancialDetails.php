<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\Product\FinancialDetails\TaxCode;

class FinancialDetails
{
    public function __construct()
    {
        $this->taxCode = TaxCode::create();
    }

    public static function create(): self
    {
        return new self();
    }

    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->taxable = $json['taxable'];
        $result->taxCode = TaxCode::fromJson($json['taxCode'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'taxable' => $this->isTaxable(),
            'taxCode' => $this->taxCode->toJson()
        ];
    }

    public function equals($other): bool
    {
        return $other instanceof FinancialDetails &&
            $this->taxable === $other->taxable &&
            $this->taxCode->equals($other->taxCode);
    }

    /** @var bool|null $taxable */
    private $taxable;
    /** @var TaxCode|null $taxCode */
    private $taxCode;

    public function isTaxable(): ?bool
    {
        return $this->taxable;
    }

    public function withTaxable(bool $taxable): FinancialDetails
    {
        $clone = clone $this;
        $clone->taxable = $taxable;
        return $clone;
    }

    public function getTaxCode(): ?TaxCode
    {
        return $this->taxCode;
    }

    public function withTaxCode(TaxCode $taxCode): FinancialDetails
    {
        $clone = clone $this;
        $clone->taxCode = $taxCode;
        return $clone;
    }
}
