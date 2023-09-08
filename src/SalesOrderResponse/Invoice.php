<?php

namespace SnowIO\BrightpearlDataModel\SalesOrderResponse;

class Invoice
{
    /** @var string|null $invoiceReference */
    protected $invoiceReference;
    /** @var string|null $taxDate */
    protected $taxDate;
    /** @var string|null $dueDate */
    protected $dueDate;

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
     * @param array<string, mixed> $json
     * @return self
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
     * @param string|null $invoiceReference
     * @return Invoice
     */
    public function withInvoiceReference(?string $invoiceReference): Invoice
    {
        $result = clone $this;
        $result->invoiceReference = $invoiceReference;
        return $result;
    }

    /**
     * @param string|null $taxDate
     * @return Invoice
     */
    public function withTaxDate(?string $taxDate): Invoice
    {
        $result = clone $this;
        $result->taxDate = $taxDate;
        return $result;
    }

    /**
     * @param string|null $dueDate
     * @return Invoice
     */
    public function withDueDate(?string $dueDate): Invoice
    {
        $result = clone $this;
        $result->dueDate = $dueDate;
        return $result;
    }

    /**
     * @return string|null
     */
    public function getInvoiceReference(): ?string
    {
        return $this->invoiceReference;
    }

    /**
     * @return string|null
     */
    public function getTaxDate(): ?string
    {
        return $this->taxDate;
    }

    /**
     * @return string|null
     */
    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }
}