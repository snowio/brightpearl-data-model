<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\Product\FinancialDetails\TaxCode;

class FinancialDetails
{
    /** @var bool|null $taxable */
    private $taxable;
    /** @var TaxCode|null $taxCode */
    private $taxCode;

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

        $taxCode = is_array($json['taxCode']) ? $json['taxCode'] : [];

        $result->taxable = is_bool($json['taxable']) && $json['taxable'];
        $result->taxCode = TaxCode::fromJson($taxCode);

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $taxCode = is_null($this->getTaxCode()) ? [] : $this->getTaxCode()->toJson();

        return [
            'taxable' => $this->isTaxable(),
            'taxCode' => $taxCode
        ];
    }

    /**
     * @return bool|null
     */
    public function isTaxable(): ?bool
    {
        return $this->taxable;
    }

    /**
     * @param bool $taxable
     * @return FinancialDetails
     */
    public function withTaxable(bool $taxable): FinancialDetails
    {
        $clone = clone $this;
        $clone->taxable = $taxable;
        return $clone;
    }

    /**
     * @return TaxCode|null
     */
    public function getTaxCode(): ?TaxCode
    {
        return $this->taxCode;
    }

    /**
     * @param TaxCode $taxCode
     * @return FinancialDetails
     */
    public function withTaxCode(TaxCode $taxCode): FinancialDetails
    {
        $clone = clone $this;
        $clone->taxCode = $taxCode;
        return $clone;
    }
}
