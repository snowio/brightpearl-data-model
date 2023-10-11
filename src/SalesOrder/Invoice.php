<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

class Invoice
{
    /** @var string|null $invoiceReference */
    private $invoiceReference;
    /** @var string|null $taxDate */
    private $taxDate;
    /** @var string|null $dueDate */
    private $dueDate;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->invoiceReference = $json['invoiceReference'] ?? null;
        $result->taxDate = $json['taxDate'] ?? null;
        $result->dueDate = $json['dueDate'] ?? null;

        return $result;
    }

    public function toJson(): array
    {
        return [
            'invoiceReference' => $this->getInvoiceReference(),
            'taxDate' => $this->getTaxDate(),
            'dueDate' => $this->getDueDate()
        ];
    }

    public function equals(Currency $currencyToCompare): bool
    {
        if ($this->getCode() !== $currencyToCompare->getCode()) {
            return false;
        }
        if ($this->getTaxDate() !== $currencyToCompare->getTaxDate()) {
            return false;
        }
        return $this->getDueDate() === $currencyToCompare->getDueDate();
    }

    public function getInvoiceReference(): ?string
    {
        return $this->invoiceReference;
    }

    public function withInvoiceReference(string $invoiceReference): self
    {
        $clone = clone $this;
        $clone->invoiceReference = $invoiceReference;
        return $clone;
    }

    public function getTaxDate(): ?string
    {
        return $this->taxDate;
    }

    public function withTaxDate(?string $taxDate): self
    {
        $clone = clone $this;
        $clone->taxDate = $taxDate;
        return $clone;
    }

    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    public function withDueDate(?string $dueDate): self
    {
        $clone = clone $this;
        $clone->dueDate = $dueDate;
        return $clone;
    }
}
