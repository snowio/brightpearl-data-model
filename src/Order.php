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
    private $orderTypeCode;

    /** @var string|null $reference */
    private $reference;

    /** @var string|null $parentOrderId */
    private $parentOrderId;

    /** @var int|null $priceListId */
    private $priceListId;

    /** @var string|null $priceModeCode */
    private $priceModeCode;

    /** @var string|null $placedOn */
    private $placedOn;
    /** @var Status|null $status */
    private $status;

    /** @var Delivery|null $delivery */
    private $delivery;

    /** @var InvoiceCollection|null $invoices */
    private $invoices;

    /** @var Currency|null $currency */
    private $currency;

    /** @var int|null $contactId */
    private $contactId;

    /** @var Parties|null $parties */
    private $parties;

    /** @var Assignment|null $assignment */
    private $assignment;

    /** @var int|null $warehouseId */
    private $warehouseId;

    /**
     * @return ModelInterface
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return ModelInterface
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $status = is_array($json['orderStatus']) ? $json['orderStatus'] : [];
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
        $result->status = Status::fromJson($status);
        $result->delivery = Delivery::fromJson($delivery);
        $result->invoices = InvoiceCollection::fromJson($invoices);
        $result->currency = Currency::fromJson($currency);
        $result->contactId = is_numeric($json['contactId']) ? (int)$json['contactId'] : null;
        $result->parties = Parties::fromJson($parties);
        $result->assignment = Assignment::fromJson($assignment);
        $result->warehouseId = is_numeric($json['warehouseId']) ? (int)$json['warehouseId'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $status = is_null($this->getStatus()) ? [] : $this->getStatus()->toJson();
        $delivery = is_null($this->getDelivery()) ? [] : $this->getDelivery()->toJson();
        $invoices = is_null($this->getInvoices()) ? [] : $this->getInvoices()->toJson();
        $currency = is_null($this->getCurrency()) ? [] : $this->getCurrency()->toJson();
        $parties = is_null($this->getParties()) ? [] : $this->getParties()->toJson();
        $assignment = is_null($this->getAssignment()) ? [] : $this->getAssignment()->toJson();
        return [
            'orderTypeCode' => $this->getOrderTypeCode(),
            'reference' => $this->getReference(),
            'parentOrderId' => $this->getParentOrderId(),
            'priceListId' => $this->getPriceListId(),
            'priceModeCode' => $this->getPriceModeCode(),
            'placedOn' => $this->getPlacedOn(),
            'orderStatus' => $status,
            'delivery' => $delivery,
            'invoices' => $invoices,
            'currency' => $currency,
            'contactId' => $this->getContactId(),
            'parties' => $parties,
            'assignment' => $assignment,
            'warehouseId' => $this->getWarehouseId(),
        ];
    }

    /**
     * @param Order $orderToCompare
     * @return bool
     */
    public function equals(ModelInterface $orderToCompare): bool
    {
        if (!is_null($this->getStatus())
            && !is_null($orderToCompare->getStatus())
            && !$this->getStatus()->equals($orderToCompare->getStatus())) {
            return false;
        }

        if (!is_null($this->getDelivery())
            && !is_null($orderToCompare->getDelivery())
            && !$this->getDelivery()->equals($orderToCompare->getDelivery())) {
            return false;
        }

        if (!is_null($this->getCurrency())
            && !is_null($orderToCompare->getCurrency())
            && !$this->getCurrency()->equals($orderToCompare->getCurrency())) {
            return false;
        }
        if (!is_null($this->getParties())
            && !is_null($orderToCompare->getParties())
            && !$this->getParties()->equals($orderToCompare->getParties())) {
            return false;
        }
        if (!is_null($this->getAssignment())
            && !is_null($orderToCompare->getAssignment())
            && !$this->getAssignment()->equals($orderToCompare->getAssignment())) {
            return false;
        }

        if ($this->getOrderTypeCode() !== $orderToCompare->getOrderTypeCode()) {
            return false;
        }
        if ($this->getReference() !== $orderToCompare->getReference()) {
            return false;
        }
        if ($this->getParentOrderId() !== $orderToCompare->getParentOrderId()) {
            return false;
        }
        if ($this->getPriceListId() !== $orderToCompare->getPriceListId()) {
            return false;
        }
        if ($this->getPriceModeCode() !== $orderToCompare->getPriceModeCode()) {
            return false;
        }
        if ($this->getPlacedOn() !== $orderToCompare->getPlacedOn()) {
            return false;
        }

        if ($this->getContactId() !== $orderToCompare->getContactId()) {
            return false;
        }

        return $this->getWarehouseId() === $orderToCompare->getWarehouseId();
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
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * @param Status|null $status
     * @return Order
     */
    public function withStatus(?Status $status): Order
    {
        $clone = clone $this;
        $clone->status = $status;
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
