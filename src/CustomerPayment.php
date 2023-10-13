<?php

namespace SnowIO\BrightpearlDataModel;

class CustomerPayment implements ModelInterface
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
    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->transactionRef = $json['transactionRef'] ?? null;
        $result->transactionCode = $json['transactionCode'] ?? null;
        $result->paymentMethodCode = $json['paymentMethodCode'] ?? null;
        $result->paymentType = $json['paymentType'] ?? null;
        $result->orderId = $json['orderId'] ?? null;
        $result->currencyIsoCode = $json['currencyIsoCode'] ?? null;
        $result->exchangeRate = $json['exchangeRate'] ?? null;
        $result->amountPaid = $json['amountPaid'] ?? null;
        $result->paymentDate = $json['paymentDate'] ?? null;
        $result->journalRef = $json['journalRef'] ?? null;
        return $result;
    }

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

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof CustomerPayment &&
            $this->transactionRef === $other->transactionRef &&
            $this->transactionCode === $other->transactionCode &&
            $this->paymentMethodCode === $other->paymentMethodCode &&
            $this->paymentType === $other->paymentType &&
            $this->orderId === $other->orderId &&
            $this->currencyIsoCode === $other->currencyIsoCode &&
            $this->exchangeRate === $other->exchangeRate &&
            $this->amountPaid === $other->amountPaid &&
            $this->paymentDate === $other->paymentDate &&
            $this->journalRef === $other->journalRef;
    }

    public function getTransactionRef(): ?string
    {
        return $this->transactionRef;
    }

    public function withTransactionRef(string $transactionRef): CustomerPayment
    {
        $clone = clone $this;
        $clone->transactionRef = $transactionRef;
        return $clone;
    }

    public function getTransactionCode(): ?string
    {
        return $this->transactionCode;
    }

    public function withTransactionCode(string $transactionCode): CustomerPayment
    {
        $clone = clone $this;
        $clone->transactionCode = $transactionCode;
        return $clone;
    }

    public function getPaymentMethodCode(): ?string
    {
        return $this->paymentMethodCode;
    }

    public function withPaymentMethodCode(string $paymentMethodCode): CustomerPayment
    {
        $clone = clone $this;
        $clone->paymentMethodCode = $paymentMethodCode;
        return $clone;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function withPaymentType(string $paymentType): CustomerPayment
    {
        $clone = clone $this;
        $clone->paymentType = $paymentType;
        return $clone;
    }

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function withOrderId(int $orderId): CustomerPayment
    {
        $clone = clone $this;
        $clone->orderId = $orderId;
        return $clone;
    }

    public function getCurrencyIsoCode(): ?string
    {
        return $this->currencyIsoCode;
    }

    public function withCurrencyIsoCode(string $currencyIsoCode): CustomerPayment
    {
        $clone = clone $this;
        $clone->currencyIsoCode = $currencyIsoCode;
        return $clone;
    }

    public function getExchangeRate(): ?float
    {
        return $this->exchangeRate;
    }

    public function withExchangeRate(float $exchangeRate): CustomerPayment
    {
        $clone = clone $this;
        $clone->exchangeRate = $exchangeRate;
        return $clone;
    }

    public function getAmountPaid(): ?float
    {
        return $this->amountPaid;
    }

    public function withAmountPaid(float $amountPaid): CustomerPayment
    {
        $clone = clone $this;
        $clone->amountPaid = $amountPaid;
        return $clone;
    }

    public function getPaymentDate(): ?string
    {
        return $this->paymentDate;
    }

    public function withPaymentDate(string $paymentDate): CustomerPayment
    {
        $clone = clone $this;
        $clone->paymentDate = $paymentDate;
        return $clone;
    }

    public function getJournalRef(): ?string
    {
        return $this->journalRef;
    }

    public function withJournalRef(string $journalRef): CustomerPayment
    {
        $clone = clone $this;
        $clone->journalRef = $journalRef;
        return $clone;
    }
}
