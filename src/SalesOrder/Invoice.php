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

    public function hasData()
    {
        return count(array_filter($this->toJson()));
    }

    public function equals(Invoice $other): bool
    {
        return $this->invoiceReference === $other->invoiceReference &&
            $this->taxDate === $other->taxDate &&
            $this->dueDate === $this->dueDate;
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
