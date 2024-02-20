<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;
use SnowIO\BrightpearlDataModel\Order;

class GetOrder extends Order implements ModelInterface
{
    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    private function __construct()
    {
        $this->orderStatus = Status::create();
        $this->delivery = Delivery::create();
        $this->invoices = InvoiceCollection::create();
        $this->currency = Currency::create();
        $this->assignment = Assignment::create();
        $this->parties = Parties::create();
        $this->orderRows = RowCollection::of([]);
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->id = $json['id'] ?? null;
        $result->orderTypeCode = $json['orderTypeCode'] ?? null;
        $result->reference = $json['reference'] ?? null;
        $result->stockStatusCode = $json['stockStatusCode'] ?? null;
        $result->allocationStatusCode = $json['allocationStatusCode'] ?? null;
        $result->shippingStatusCode = $json['shippingStatusCode'] ?? null;
        $result->parentOrderId = $json['parentOrderId'] ?? null;
        $result->priceListId = $json['priceListId'] ?? null;
        $result->priceModeCode = $json['priceModeCode'] ?? null;
        $result->placedOn = $json['placedOn'] ?? null;
        $result->orderStatus = Status::fromJson($json['orderStatus'] ?? []);
        $result->delivery = Delivery::fromJson($json['delivery'] ?? []);
        $result->invoices = InvoiceCollection::fromJson($json['invoices'] ?? []);
        $result->currency = Currency::fromJson($json['currency'] ?? []);
        $result->contactId = $json['contactId'] ?? null;
        $result->parties = Parties::fromJson($json['parties'] ?? []);
        $result->assignment = Assignment::fromJson($json['assignment'] ?? []);
        $result->warehouseId = $json['warehouseId'] ?? null;
        $result->customFields = $json['customFields'] ?? [];
        $result->orderRows = RowCollection::fromJson($json['orderRows'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'orderTypeCode' => $this->getOrderTypeCode(),
            'reference' => $this->getReference(),
            'stockStatusCode' => $this->getStockStatusCode(),
            'allocationStatusCode' => $this->getAllocationStatusCode(),
            'shippingStatusCode' => $this->getShippingStatusCode(),
            'parentOrderId' => $this->getParentOrderId(),
            'priceListId' => $this->getPriceListId(),
            'priceModeCode' => $this->getPriceModeCode(),
            'placedOn' => $this->getPlacedOn(),
            'orderStatus' => $this->getOrderStatus() ? $this->getOrderStatus()->toJson() : null,
            'delivery' => $this->delivery->hasData() ? $this->getDelivery()->toJson() : null,
            'invoices' => $this->invoices ? $this->getInvoices()->toJson() : null,
            'currency' => $this->currency->hasData() ? $this->getCurrency()->toJson() : null,
            'contactId' => $this->getContactId(),
            'parties' => $this->getParties() ? $this->getParties()->toJson() : null,
            'assignment' => $this->assignment->hasData() ? $this->getAssignment()->toJson() : null,
            'warehouseId' => $this->getWarehouseId(),
            'orderRows' => $this->getOrderRows()->toJson() ?? null,
            'customFields' => $this->getCustomFields()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Order &&
            ($this->orderTypeCode === $other->orderTypeCode) &&
            ($this->reference === $other->reference) &&
            ($this->stockStatusCode === $other->stockStatusCode) &&
            ($this->allocationStatusCode === $other->allocationStatusCode) &&
            ($this->shippingStatusCode === $other->shippingStatusCode) &&
            ($this->parentOrderId === $other->parentOrderId) &&
            ($this->priceListId === $other->priceListId) &&
            ($this->priceModeCode === $other->priceModeCode) &&
            ($this->placedOn === $other->placedOn) &&
            ($this->orderStatus->equals($other->orderStatus)) &&
            ($this->delivery->equals($other->delivery)) &&
            ($this->invoices->equals($other->invoices)) &&
            ($this->currency->equals($other->currency)) &&
            ($this->contactId === $other->contactId) &&
            ($this->parties->equals($other->parties)) &&
            ($this->assignment->equals($other->assignment)) &&
            ($this->customFields == $other->customFields) &&
            ($this->orderRows->toJson() == $other->orderRows->toJson()) &&
            ($this->warehouseId === $other->warehouseId);
    }

    /** @var int|null $id */
    protected $id;
    /** @var string|null $orderTypeCode */
    protected $orderTypeCode;
    /** @var string|null $reference */
    protected $reference;
    /** @var string|null $stockStatusCode */
    protected $stockStatusCode;
    /** @var string|null $allocationStatusCode */
    protected $allocationStatusCode;
    /** @var string|null $shippingStatusCode */
    protected $shippingStatusCode;
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
    /** @var RowCollection|null $orderRows */
    protected $orderRows;
    /** @var array $customFields */
    protected $customFields = [];

    public function getOrderTypeCode(): ?string
    {
        return $this->orderTypeCode;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function withId(string $id): Order
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
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

    public function withStockStatusCode(string $stockStatusCode): Order
    {
        $clone = clone $this;
        $clone->stockStatusCode = $stockStatusCode;
        return $clone;
    }

    public function getStockStatusCode(): ?string
    {
        return $this->stockStatusCode;
    }

    public function withAllocationStatusCode(string $allocationStatusCode): Order
    {
        $clone = clone $this;
        $clone->allocationStatusCode = $allocationStatusCode;
        return $clone;
    }

    public function getAllocationStatusCode(): ?string
    {
        return $this->allocationStatusCode;
    }

    public function withShippingStatusCode(string $shippingStatusCode): Order
    {
        $clone = clone $this;
        $clone->shippingStatusCode = $shippingStatusCode;
        return $clone;
    }

    public function getShippingStatusCode(): ?string
    {
        return $this->shippingStatusCode;
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

    public function getCustomFields(): array
    {
        return $this->customFields;
    }

    public function withCustomFields(array $customFields): self
    {
        $clone = clone $this;
        $clone->customFields = $customFields;
        return $clone;
    }

    public function getOrderRows(): ?RowCollection
    {
        return $this->orderRows;
    }

    public function withOrderRows(RowCollection $orderRows): self
    {
        $clone = clone $this;
        $clone->orderRows = $orderRows;
        return $clone;
    }
}
