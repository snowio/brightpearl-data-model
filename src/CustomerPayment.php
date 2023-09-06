<?php

namespace SnowIO\BrightpearlDataModel;

class CustomerPayment
{
    /** @var string|null $transactionRef */
    private $transactionRef;
    /** @var string|null $transactionCode */
    private $transactionCode;
    /** @var string|null $paymentMethodCode */
    private $paymentMethodCode;
    /** @var string|null $paymentType */
    private $paymentType;
    /** @var int|null $orderId */
    private $orderId;
    /** @var string|null $currencyIsoCode */
    private $currencyIsoCode;
    /** @var float|null $exchangeRate */
    private $exchangeRate;
    /** @var float|null $amountPaid */
    private $amountPaid;
    /** @var string|null $paymentDate */
    private $paymentDate;
    /** @var string|null $journalRef */
    private $journalRef;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $eventJson
     */
    public static function fromJson(array $eventJson): self
    {
        $result = new self();
        $result->transactionRef = is_string($eventJson['transactionRef']) ? $eventJson['transactionRef'] : null;
        $result->transactionCode = is_string($eventJson['transactionCode']) ? $eventJson['transactionCode'] : null;
        $result->paymentMethodCode = is_string($eventJson['paymentMethodCode']) ? $eventJson['paymentMethodCode'] : null;
        $result->paymentType = is_string($eventJson['paymentType']) ? $eventJson['paymentType'] : null;
        $result->orderId = is_int($eventJson['orderId']) ? $eventJson['orderId'] : null;
        $result->currencyIsoCode = is_string($eventJson['currencyIsoCode']) ? $eventJson['currencyIsoCode'] : null;
        $result->exchangeRate = is_float($eventJson['exchangeRate']) ? $eventJson['exchangeRate'] : null;
        $result->amountPaid = is_float($eventJson['amountPaid']) ? $eventJson['amountPaid'] : null;
        $result->paymentDate = is_string($eventJson['paymentDate']) ? $eventJson['paymentDate'] : null;
        $result->journalRef = is_string($eventJson['journalRef']) ? $eventJson['journalRef'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'transactionRef' => $this->getTransactionRef(),
            'transactionCode' => $this->getTransactionCode(),
            'paymentMethodCode' => $this->getPaymentMethodCode(),
            'paymentType' => $this->getPaymentType(),
            'orderId' => $this->getOrderId(),
            'currencyIsoCode' => $this->getCurrencyIsoCode(),
            'exchangeRate' => $this->getExchangeRate(),
            'amountPaid' => $this->getAmountPaid(),
            'paymentDate' => $this->getPaymentDate(),
            'journalRef' => $this->getJournalRef()];
    }

    /**
     * @param CustomerPayment $customerPaymentToCompare
     * @return bool
     */
    public function equals(CustomerPayment $customerPaymentToCompare): bool
    {
        if ($this->getTransactionCode() !== $customerPaymentToCompare->getTransactionCode()) {
            return false;
        }

        if ($this->getPaymentMethodCode() !== $customerPaymentToCompare->getPaymentMethodCode()) {
            return false;
        }

        if ($this->getPaymentType() !== $customerPaymentToCompare->getPaymentType()) {
            return false;
        }
        if ($this->getOrderId() !== $customerPaymentToCompare->getOrderId()) {
            return false;
        }
        if ($this->getCurrencyIsoCode() !== $customerPaymentToCompare->getCurrencyIsoCode()) {
            return false;
        }
        if ($this->getExchangeRate() !== $customerPaymentToCompare->getExchangeRate()) {
            return false;
        }

        if ($this->getAmountPaid() !== $customerPaymentToCompare->getAmountPaid()) {
            return false;
        }

        if ($this->getPaymentDate() !== $customerPaymentToCompare->getPaymentDate()) {
            return false;
        }

        if ($this->getJournalRef() !== $customerPaymentToCompare->getJournalRef()) {
            return false;
        }

        return $this->getTransactionRef() === $customerPaymentToCompare->getTransactionRef();
    }

    /**
     * @return string|null
     */
    public function getTransactionRef(): ?string
    {
        return $this->transactionRef;
    }

    /**
     * @param string $transactionRef
     * @return CustomerPayment
     */
    public function withTransactionRef(string $transactionRef): CustomerPayment
    {
        $clone = clone $this;
        $clone->transactionRef = $transactionRef;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTransactionCode(): ?string
    {
        return $this->transactionCode;
    }

    /**
     * @param string $transactionCode
     * @return CustomerPayment
     */
    public function withTransactionCode(string $transactionCode): CustomerPayment
    {
        $clone = clone $this;
        $clone->transactionCode = $transactionCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethodCode(): ?string
    {
        return $this->paymentMethodCode;
    }

    /**
     * @param string $paymentMethodCode
     * @return CustomerPayment
     */
    public function withPaymentMethodCode(string $paymentMethodCode): CustomerPayment
    {
        $clone = clone $this;
        $clone->paymentMethodCode = $paymentMethodCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     * @return CustomerPayment
     */
    public function withPaymentType(string $paymentType): CustomerPayment
    {
        $clone = clone $this;
        $clone->paymentType = $paymentType;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     * @return CustomerPayment
     */
    public function withOrderId(int $orderId): CustomerPayment
    {
        $clone = clone $this;
        $clone->orderId = $orderId;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getCurrencyIsoCode(): ?string
    {
        return $this->currencyIsoCode;
    }

    /**
     * @param string $currencyIsoCode
     * @return CustomerPayment
     */
    public function withCurrencyIsoCode(string $currencyIsoCode): CustomerPayment
    {
        $clone = clone $this;
        $clone->currencyIsoCode = $currencyIsoCode;
        return $clone;
    }

    /**
     * @return float|null
     */
    public function getExchangeRate(): ?float
    {
        return $this->exchangeRate;
    }

    /**
     * @param float $exchangeRate
     * @return CustomerPayment
     */
    public function withExchangeRate(float $exchangeRate): CustomerPayment
    {
        $clone = clone $this;
        $clone->exchangeRate = $exchangeRate;
        return $clone;
    }

    /**
     * @return float|null
     */
    public function getAmountPaid(): ?float
    {
        return $this->amountPaid;
    }

    /**
     * @param float $amountPaid
     * @return CustomerPayment
     */
    public function withAmountPaid(float $amountPaid): CustomerPayment
    {
        $clone = clone $this;
        $clone->amountPaid = $amountPaid;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getPaymentDate(): ?string
    {
        return $this->paymentDate;
    }

    /**
     * @param string $paymentDate
     * @return CustomerPayment
     */
    public function withPaymentDate(string $paymentDate): CustomerPayment
    {
        $clone = clone $this;
        $clone->paymentDate = $paymentDate;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getJournalRef(): ?string
    {
        return $this->journalRef;
    }

    /**
     * @param string $journalRef
     * @return CustomerPayment
     */
    public function withJournalRef(string $journalRef): CustomerPayment
    {
        $clone = clone $this;
        $clone->journalRef = $journalRef;
        return $clone;
    }
}
