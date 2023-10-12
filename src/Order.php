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

    public function getOrderTypeCode(): ?string
    {
        return $this->orderTypeCode;
    }

    public function withOrderTypeCode(string $orderTypeCode): self
    {
        $clone = clone $this;
        $clone->orderTypeCode = $orderTypeCode;
        return $clone;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function withReference(string $reference): Order
    {
        $clone = clone $this;
        $clone->reference = $reference;
        return $clone;
    }

    public function getParentOrderId(): ?string
    {
        return $this->parentOrderId;
    }

    public function withParentOrderId(string $parentOrderId): Order
    {
        $clone = clone $this;
        $clone->parentOrderId = $parentOrderId;
        return $clone;
    }

    public function getPriceListId(): ?int
    {
        return $this->priceListId;
    }

    public function withPriceListId(?int $priceListId): Order
    {
        $clone = clone $this;
        $clone->priceListId = $priceListId;
        return $clone;
    }

    public function getPriceModeCode(): ?string
    {
        return $this->priceModeCode;
    }

    public function withPriceModeCode(?string $priceModeCode): Order
    {
        $clone = clone $this;
        $clone->priceModeCode = $priceModeCode;
        return $clone;
    }

    public function getPlacedOn(): ?string
    {
        return $this->placedOn;
    }

    public function withPlacedOn(?string $placedOn): Order
    {
        $clone = clone $this;
        $clone->placedOn = $placedOn;
        return $clone;
    }

    public function getOrderStatus(): ?Status
    {
        return $this->orderStatus;
    }

    public function withOrderStatus(?Status $orderStatus): Order
    {
        $clone = clone $this;
        $clone->orderStatus = $orderStatus;
        return $clone;
    }

    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    public function withDelivery(?Delivery $delivery): Order
    {
        $clone = clone $this;
        $clone->delivery = $delivery;
        return $clone;
    }

    public function getInvoices(): ?InvoiceCollection
    {
        return $this->invoices;
    }

    public function withInvoices(?InvoiceCollection $invoices): Order
    {
        $clone = clone $this;
        $clone->invoices = $invoices;
        return $clone;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function withCurrency(?Currency $currency): Order
    {
        $clone = clone $this;
        $clone->currency = $currency;
        return $clone;
    }

    public function getContactId(): ?int
    {
        return $this->contactId;
    }

    public function withContactId(?int $contactId): Order
    {
        $clone = clone $this;
        $clone->contactId = $contactId;
        return $clone;
    }

    public function getParties(): ?Parties
    {
        return $this->parties;
    }

    public function withParties(?Parties $parties): Order
    {
        $clone = clone $this;
        $clone->parties = $parties;
        return $clone;
    }

    public function getAssignment(): ?Assignment
    {
        return $this->assignment;
    }

    public function withAssignment(?Assignment $assignment): Order
    {
        $clone = clone $this;
        $clone->assignment = $assignment;
        return $clone;
    }

    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    public function withWarehouseId(?int $warehouseId): Order
    {
        $clone = clone $this;
        $clone->warehouseId = $warehouseId;
        return $clone;
    }
}
