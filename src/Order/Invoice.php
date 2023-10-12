<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Invoice implements ModelInterface
{
    /** @var string|null $taxDate */
    private $taxDate;


    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->taxDate = is_string($json['taxDate']) ? $json['taxDate'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'taxDate' => $this->getTaxDate()
        ];
    }

    /**
     * @return string|null
     */
    public function getTaxDate(): ?string
    {
        return $this->taxDate;
    }

    /**
     * @param string|null $taxDate
     * @return Invoice
     */
    public function withTaxDate(?string $taxDate): Invoice
    {
        $clone = clone $this;
        $clone->taxDate = $taxDate;
        return $clone;
    }

    /**
     * @param ModelInterface $invoiceToCompare
     * @return bool
     */
    public function equals(ModelInterface $invoiceToCompare): bool
    {
        if (!$invoiceToCompare instanceof Invoice) {
            return false;
        }
        return $this->getTaxDate() === $invoiceToCompare->getTaxDate();
    }
}
