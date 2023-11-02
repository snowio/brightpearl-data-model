<?php

namespace SnowIO\BrightpearlDataModel\OrderRow;

use SnowIO\BrightpearlDataModel\ModelInterface;

class RowValue implements ModelInterface
{
    /** @var string|null $taxCode */
    protected $taxCode;
    /** @var string|null $rowNet */
    protected $rowNet;
    /** @var string|null $rowTax */
    protected $rowTax;

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
        $result->taxCode = $json['taxCode'] ?? null;
        $result->rowNet = $json['rowNet']['value'] ?? null;
        $result->rowTax = $json['rowTax']['value'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'taxCode' => $this->getTaxCode(),
            'rowNet' => ['value' => $this->rowNet ?? 0],
            'rowTax' => ['value' => $this->rowTax ?? 0],
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof RowValue &&
            $this->taxCode === $other->taxCode &&
            $this->rowNet === $other->rowNet &&
            $this->rowTax === $other->rowTax;
    }

    public function getRowNet(): ?string
    {
        return $this->rowNet;
    }

    public function withRowNet(?string $rowNet): RowValue
    {
        $clone = clone $this;
        $clone->rowNet = $rowNet;
        return $clone;
    }

    public function getRowTax(): ?string
    {
        return $this->rowTax;
    }

    public function withRowTax(string $rowTax): RowValue
    {
        $clone = clone $this;
        $clone->rowTax = $rowTax;
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
}
