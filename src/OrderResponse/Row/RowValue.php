<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse\Row;

class RowValue
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

        $rowNet = is_array($json['rowNet']) ? $json['rowNet'] : [];
        $rowTax = is_array($json['rowTax']) ? $json['rowTax'] : [];

        $result->taxRate = is_string($json['taxRate']) ? $json['taxRate'] : null;
        $result->taxCode = is_string($json['taxCode']) ? $json['taxCode'] : null;
        $result->taxCalculator = is_string($json['taxCalculator']) ? $json['taxCalculator'] : null;
        $result->rowNet = Amount::fromJson($rowNet);
        $result->rowTax = Amount::fromJson($rowTax);
        $result->taxClassId = is_numeric($json['taxClassId']) ? (int)$json['taxClassId'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $rowNet = is_null($this->getRowNet()) ? [] : $this->getRowNet()->toJson();
        $rowTax = is_null($this->getRowTax()) ? [] : $this->getRowTax()->toJson();

        return [
            'taxRate' => $this->getTaxRate(),
            'taxCode' => $this->getTaxCode(),
            'taxCalculator' => $this->getTaxCalculator(),
            'rowNet' => $rowNet,
            'rowTax' => $rowTax,
            'taxClassId' => $this->getTaxClassId()
        ];
    }

    /**
     * @return string|null
     */
    public function getTaxRate(): ?string
    {
        return $this->taxRate;
    }

    /**
     * @param string $taxRate
     * @return RowValue
     */
    public function withTaxRate(string $taxRate): RowValue
    {
        $clone = clone $this;
        $clone->taxRate = $taxRate;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    /**
     * @param string $taxCode
     * @return RowValue
     */
    public function withTaxCode(string $taxCode): RowValue
    {
        $clone = clone $this;
        $clone->taxCode = $taxCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTaxCalculator(): ?string
    {
        return $this->taxCalculator;
    }

    /**
     * @param string $taxCalculator
     * @return RowValue
     */
    public function withTaxCalculator(string $taxCalculator): RowValue
    {
        $clone = clone $this;
        $clone->taxCalculator = $taxCalculator;
        return $clone;
    }

    /**
     * @return Amount|null
     */
    public function getRowNet(): ?Amount
    {
        return $this->rowNet;
    }

    /**
     * @param Amount $rowNet
     * @return RowValue
     */
    public function withRowNet(Amount $rowNet): RowValue
    {
        $clone = clone $this;
        $clone->rowNet = $rowNet;
        return $clone;
    }

    /**
     * @return Amount|null
     */
    public function getRowTax(): ?Amount
    {
        return $this->rowTax;
    }

    /**
     * @param Amount $rowTax
     * @return RowValue
     */
    public function withRowTax(Amount $rowTax): RowValue
    {
        $clone = clone $this;
        $clone->rowTax = $rowTax;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getTaxClassId(): ?int
    {
        return $this->taxClassId;
    }

    /**
     * @param int $taxClassId
     * @return RowValue
     */
    public function withTaxClassId(int $taxClassId): RowValue
    {
        $clone = clone $this;
        $clone->taxClassId = $taxClassId;
        return $clone;
    }
}
