<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\Product\FinancialDetails\TaxCode;

class FinancialDetails
{
    /** @var bool $taxable */
    private $taxable;
    /** @var TaxCode $taxCode */
    private $taxCode;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->taxable = $json['taxable'];
        $result->taxCode = TaxCode::fromJson($json['taxCode']);

        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        $json['taxable'] = $this->taxable;
        $json['taxCode'] = $this->taxCode->toJson();

        return $json;
    }

    /**
     * @return bool
     */
    public function isTaxable(): bool
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
     * @return TaxCode
     */
    public function getTaxCode(): TaxCode
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
