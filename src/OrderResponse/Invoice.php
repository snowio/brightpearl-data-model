<?php

namespace SnowIO\BrightpearlDataModel\OrderResponse;

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

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->invoiceReference = is_string($json['invoiceReference']) ? $json['invoiceReference'] : null;
        $result->taxDate = is_string($json['taxDate']) ? $json['taxDate'] : null;
        $result->dueDate = is_string($json['dueDate']) ? $json['dueDate'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'invoiceReference' => $this->getInvoiceReference(),
            'taxDate' => $this->getTaxDate(),
            'dueDate' => $this->getDueDate()
        ];
    }

    /**
     * @return string|null
     */
    public function getInvoiceReference(): ?string
    {
        return $this->invoiceReference;
    }

    /**
     * @param string|null $invoiceReference
     * @return Invoice
     */
    public function withInvoiceReference(?string $invoiceReference): Invoice
    {
        $clone = clone $this;
        $clone->invoiceReference = $invoiceReference;
        return $clone;
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
     * @return string|null
     */
    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    /**
     * @param string|null $dueDate
     * @return Invoice
     */
    public function withDueDate(?string $dueDate): Invoice
    {
        $clone = clone $this;
        $clone->dueDate = $dueDate;
        return $clone;
    }
}
