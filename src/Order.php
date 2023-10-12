<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;
use SnowIO\BrightpearlDataModel\Order\Assignment;
use SnowIO\BrightpearlDataModel\Order\Currency;
use SnowIO\BrightpearlDataModel\Order\Delivery;
use SnowIO\BrightpearlDataModel\Order\InvoiceCollection;
use SnowIO\BrightpearlDataModel\Order\Parties;
use SnowIO\BrightpearlDataModel\Order\Status;

class Order implements ModelInterface
{
    /** @var string|null $orderTypeCode */
    protected $orderTypeCode;

    /** @var string|null $reference */
    protected $reference;

    /** @var string|null $parentOrderId */
    protected $parentOrderId;

    /** @var int|null $priceListId */
    protected $priceListId;

    /** @var string|null $priceModeCode */
    protected $priceModeCode;

    /** @var string|null $placedOn */
    protected $placedOn;
    /** @var Status|null $orderStatus */
    protected $orderStatus;

    /** @var Delivery|null $delivery */
    protected $delivery;

    /** @var InvoiceCollection|null $invoices */
    protected $invoices;

    /** @var Currency|null $currency */
    protected $currency;

    /** @var int|null $contactId */
    protected $contactId;

    /** @var Parties|null $parties */
    protected $parties;

    /** @var Assignment|null $assignment */
    protected $assignment;

    /** @var int|null $warehouseId */
    protected $warehouseId;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $orderStatus = is_array($json['orderStatus']) ? $json['orderStatus'] : [];
        $delivery = is_array($json['delivery']) ? $json['delivery'] : [];
        $invoices = is_array($json['invoices']) ? $json['invoices'] : [];
        $currency = is_array($json['currency']) ? $json['currency'] : [];
        $parties = is_array($json['parties']) ? $json['parties'] : [];
        $assignment = is_array($json['assignment']) ? $json['assignment'] : [];
        $result->orderTypeCode = is_string($json['orderTypeCode']) ? $json['orderTypeCode'] : null;
        $result->reference = is_string($json['reference']) ? $json['reference'] : null;
        $result->parentOrderId = is_string($json['parentOrderId']) ? $json['parentOrderId'] : null;
        $result->priceListId = is_numeric($json['priceListId']) ? (int)$json['priceListId'] : null;
        $result->priceModeCode = is_string($json['priceModeCode']) ? $json['priceModeCode'] : null;
        $result->placedOn = is_string($json['placedOn']) ? $json['placedOn'] : null;
        $result->orderStatus = Status::fromJson($orderStatus);
        $result->delivery = Delivery::fromJson($delivery);
        $result->invoices = InvoiceCollection::fromJson($invoices);
        $result->currency = Currency::fromJson($currency);
        $result->contactId = is_numeric($json['contactId']) ? (int)$json['contactId'] : null;
        $result->parties = Parties::fromJson($parties);
        $result->assignment = Assignment::fromJson($assignment);
        $result->warehouseId = is_numeric($json['warehouseId']) ? (int)$json['warehouseId'] : null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'orderTypeCode' => $this->getOrderTypeCode(),
            'reference' => $this->getReference(),
            'parentOrderId' => $this->getParentOrderId(),
            'priceListId' => $this->getPriceListId(),
            'priceModeCode' => $this->getPriceModeCode(),
            'placedOn' => $this->getPlacedOn(),
            'orderStatus' => $this->getOrderStatus()->toJson(),
            'delivery' => $this->getDelivery()->toJson(),
            'invoices' => $this->getInvoices()->toJson(),
            'currency' => $this->getCurrency()->toJson(),
            'contactId' => $this->getContactId(),
            'parties' => $this->getParties()->toJson(),
            'assignment' => $this->getAssignment()->toJson(),
            'warehouseId' => $this->getWarehouseId(),
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Order &&
            ($this->orderTypeCode === $other->orderTypeCode) &&
            ($this->reference === $other->reference) &&
            ($this->parentOrderId === $other->parentOrderId) &&
            ($this->priceListId === $other->priceListId) &&
            ($this->priceModeCode === $other->priceModeCode) &&
            ($this->placedOn === $other->placedOn) &&
            ($this->orderStatus->equals($other->orderStatus)) &&
            ($this->delivery->equals($other->delivery)) &&
            ($this->invoices->toJson() == $other->invoices->toJson()) &&
            ($this->currency->equals($other->currency)) &&
            ($this->contactId === $other->contactId) &&
            ($this->parties->equals($other->parties)) &&
            ($this->assignment->equals($other->assignment)) &&
            ($this->warehouseId === $other->warehouseId);
    }

    /**
     * @return string|null
     */
    public function getOrderTypeCode(): ?string
    {
        return $this->orderTypeCode;
    }

    /**
     * @param string $orderTypeCode
     * @return Order
     */
    public function withOrderTypeCode(string $orderTypeCode): self
    {
        $clone = clone $this;
        $clone->orderTypeCode = $orderTypeCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return Order
     */
    public function withReference(string $reference): Order
    {
        $clone = clone $this;
        $clone->reference = $reference;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getParentOrderId(): ?string
    {
        return $this->parentOrderId;
    }

    /**
     * @param string $parentOrderId
     * @return Order
     */
    public function withParentOrderId(string $parentOrderId): Order
    {
        $clone = clone $this;
        $clone->parentOrderId = $parentOrderId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getPriceListId(): ?int
    {
        return $this->priceListId;
    }

    /**
     * @param int|null $priceListId
     * @return Order
     */
    public function withPriceListId(?int $priceListId): Order
    {
        $clone = clone $this;
        $clone->priceListId = $priceListId;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getPriceModeCode(): ?string
    {
        return $this->priceModeCode;
    }

    /**
     * @param string|null $priceModeCode
     * @return Order
     */
    public function withPriceModeCode(?string $priceModeCode): Order
    {
        $clone = clone $this;
        $clone->priceModeCode = $priceModeCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getPlacedOn(): ?string
    {
        return $this->placedOn;
    }

    /**
     * @param string|null $placedOn
     * @return Order
     */
    public function withPlacedOn(?string $placedOn): Order
    {
        $clone = clone $this;
        $clone->placedOn = $placedOn;
        return $clone;
    }

    /**
     * @return Status|null
     */
    public function getOrderStatus(): ?Status
    {
        return $this->orderStatus;
    }

    /**
     * @param Status|null $status
     * @return Order
     */
    public function withOrderStatus(?Status $orderStatus): Order
    {
        $clone = clone $this;
        $clone->orderStatus = $orderStatus;
        return $clone;
    }

    /**
     * @return Delivery|null
     */
    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    /**
     * @param Delivery|null $delivery
     * @return Order
     */
    public function withDelivery(?Delivery $delivery): Order
    {
        $clone = clone $this;
        $clone->delivery = $delivery;
        return $clone;
    }

    /**
     * @return InvoiceCollection|null
     */
    public function getInvoices(): ?InvoiceCollection
    {
        return $this->invoices;
    }

    /**
     * @param InvoiceCollection|null $invoices
     * @return Order
     */
    public function withInvoices(?InvoiceCollection $invoices): Order
    {
        $clone = clone $this;
        $clone->invoices = $invoices;
        return $clone;
    }

    /**
     * @return Currency|null
     */
    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency|null $currency
     * @return Order
     */
    public function withCurrency(?Currency $currency): Order
    {
        $clone = clone $this;
        $clone->currency = $currency;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getContactId(): ?int
    {
        return $this->contactId;
    }

    /**
     * @param int|null $contactId
     * @return Order
     */
    public function withContactId(?int $contactId): Order
    {
        $clone = clone $this;
        $clone->contactId = $contactId;
        return $clone;
    }

    /**
     * @return Parties|null
     */
    public function getParties(): ?Parties
    {
        return $this->parties;
    }

    /**
     * @param Parties|null $parties
     * @return Order
     */
    public function withParties(?Parties $parties): Order
    {
        $clone = clone $this;
        $clone->parties = $parties;
        return $clone;
    }

    /**
     * @return Assignment|null
     */
    public function getAssignment(): ?Assignment
    {
        return $this->assignment;
    }

    /**
     * @param Assignment|null $assignment
     * @return Order
     */
    public function withAssignment(?Assignment $assignment): Order
    {
        $clone = clone $this;
        $clone->assignment = $assignment;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    /**
     * @param int|null $warehouseId
     * @return Order
     */
    public function withWarehouseId(?int $warehouseId): Order
    {
        $clone = clone $this;
        $clone->warehouseId = $warehouseId;
        return $clone;
    }
}
