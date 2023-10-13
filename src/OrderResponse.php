<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\OrderResponse\Delivery;
use SnowIO\BrightpearlDataModel\OrderResponse\InvoiceCollection;
use SnowIO\BrightpearlDataModel\OrderResponse\OrderStatus;
use SnowIO\BrightpearlDataModel\OrderResponse\Parties;
use SnowIO\BrightpearlDataModel\OrderResponse\RowCollection;
use SnowIO\BrightpearlDataModel\OrderResponse\State;
use SnowIO\BrightpearlDataModel\OrderResponse\TotalValue;

class OrderResponse implements ModelInterface
{
    /** @var int|null $id */
    private $id;
    /** @var int|null $parentOrderId */
    private $parentOrderId;
    /** @var string|null $orderTypeCode */
    private $orderTypeCode;
    /** @var OrderStatus|null $orderStatus */
    private $orderStatus;
    /** @var RowCollection|null */
    private $orderRows;
    /** @var TotalValue|null $totalValue */
    private $totalValue;
    /** @var Parties|null */
    private $parties;
    /** @var string|null $externalRef */
    private $externalRef;
    /** @var string|null $reference */
    private $reference;
    /** @var State|null $state */
    private $state;
    /** @var string|null $orderPaymentStatus */
    private $orderPaymentStatus;
    /** @var string|null $stockStatusCode */
    private $stockStatusCode;
    /** @var string|null $allocationStatusCode */
    private $allocationStatusCode;
    /** @var string|null $shippingStatusCode */
    private $shippingStatusCode;
    /** @var string|null $placedOn */
    private $placedOn;
    /** @var string|null $createdOn */
    private $createdOn;
    /** @var string|null $updatedOn */
    private $updatedOn;
    /** @var string|null $createdById */
    private $createdById;
    /** @var string|null $priceListId */
    private $priceListId;
    /** @var string|null $priceModeCode */
    private $priceModeCode;
    /** @var Delivery|null $delivery */
    private $delivery;
    /** @var InvoiceCollection|null */
    private $invoices;
    /** @var int|null $warehouseId */
    private $warehouseId;
    /** @var int|null $acknowledged */
    private $acknowledged;
    /** @var int|null $costPriceListId */
    private $costPriceListId;
    /** @var bool|null $historicalOrder */
    private $historicalOrder;
    /** @var bool|null $isDropship */
    private $isDropship;
    /** @var int|null $orderWeighting */
    private $orderWeighting;

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
        $result->id = $json['id'] ?? null;
        $result->parentOrderId = $json['parentOrderId'] ?? null;
        $result->orderTypeCode = $json['orderTypeCode'] ?? null;
        $result->orderStatus = OrderStatus::fromJson($json['orderStatus'] ?? []);
        $result->orderRows = RowCollection::fromJson($json['orderRows'] ?? []);
        $result->externalRef = $json['externalRef'] ?? null;
        $result->reference = $json['reference'] ?? null;
        $result->state = State::fromJson($json['state'] ?? []);
        $result->totalValue = TotalValue::fromJson($json['totalValue'] ?? []);
        $result->parties = Parties::fromJson($json['parties'] ?? []);
        $result->orderPaymentStatus = $json['orderPaymentStatus'] ?? null;
        $result->stockStatusCode = $json['stockStatusCode'] ?? null;
        $result->allocationStatusCode = $json['allocationStatusCode'] ?? null;
        $result->shippingStatusCode = $json['shippingStatusCode'] ?? null;
        $result->placedOn = $json['placedOn'] ?? null;
        $result->createdOn = $json['createdOn'] ?? null;
        $result->updatedOn = $json['updatedOn'] ?? null;
        $result->createdById = $json['createdById'] ?? null;
        $result->priceListId = $json['priceListId'] ?? null;
        $result->priceModeCode = $json['priceModeCode'] ?? null;
        $result->delivery = Delivery::fromJson($json['delivery'] ?? []);
        $result->invoices = InvoiceCollection::fromJson($json['invoices'] ?? []);
        $result->warehouseId = $json['warehouseId'] ?? null;
        $result->acknowledged = $json['acknowledged'] ?? null;
        $result->costPriceListId = $json['costPriceListId'] ?? null;
        $result->historicalOrder = $json['historicalOrder'] ?? null;
        $result->isDropship = $json['isDropship'] ?? null;
        $result->orderWeighting = $json['orderWeighting'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'parentOrderId' => $this->getParentOrderId(),
            'orderTypeCode' => $this->getOrderTypeCode(),
            'orderStatus' => $this->getOrderStatus()->toJson(),
            'orderRows' => $this->getOrderRows()->toJson(),
            'externalRef' => $this->getExternalRef(),
            'reference' => $this->getReference(),
            'state' => $this->getState()->toJson(),
            'orderPaymentStatus' => $this->getOrderPaymentStatus(),
            'stockStatusCode' => $this->getStockStatusCode(),
            'allocationStatusCode' => $this->getAllocationStatusCode(),
            'shippingStatusCode' => $this->getShippingStatusCode(),
            'placedOn' => $this->getPlacedOn(),
            'createdOn' => $this->getCreatedOn(),
            'updatedOn' => $this->getUpdatedOn(),
            'createdById' => $this->getCreatedById(),
            'priceListId' => $this->getPriceListId(),
            'priceModeCode' => $this->getPriceModeCode(),
            'delivery' => $this->getDelivery()->toJson(),
            'invoices' => $this->getInvoices()->toJson(),
            'totalValue' => $this->getTotalValue()->toJson(),
            'parties' => $this->getParties()->toJson(),
            'warehouseId' => $this->getWarehouseId(),
            'acknowledged' => $this->getAcknowledged(),
            'costPriceListId' => $this->getCostPriceListId(),
            'historicalOrder' => $this->getHistoricalOrder(),
            'isDropship' => $this->getIsDropship(),
            'orderWeighting' => $this->getOrderWeighting()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof OrderResponse &&
            $this->id === $other->id &&
            $this->parentOrderId === $other->parentOrderId &&
            $this->orderTypeCode === $other->orderTypeCode &&
            $this->orderStatus->equals($other->orderStatus) &&
            $this->orderRows->equals($other->orderRows) &&
            $this->externalRef === $other->externalRef &&
            $this->reference === $other->reference &&
            $this->state->equals($other->state) &&
            $this->orderPaymentStatus === $other->orderPaymentStatus &&
            $this->stockStatusCode === $other->stockStatusCode &&
            $this->allocationStatusCode === $other->allocationStatusCode &&
            $this->shippingStatusCode === $other->shippingStatusCode &&
            $this->placedOn === $other->placedOn &&
            $this->createdOn === $other->createdOn &&
            $this->updatedOn === $other->updatedOn &&
            $this->createdById === $other->createdById &&
            $this->priceListId === $other->priceListId &&
            $this->priceModeCode === $other->priceModeCode &&
            $this->delivery->equals($other->delivery) &&
            $this->invoices->equals($other->invoices) &&
            $this->totalValue->equals($other->totalValue) &&
            $this->parties->equals($other->parties) &&
            $this->warehouseId === $other->warehouseId &&
            $this->acknowledged === $other->acknowledged &&
            $this->costPriceListId === $other->costPriceListId &&
            $this->historicalOrder === $other->historicalOrder &&
            $this->isDropship === $other->isDropship &&
            $this->orderWeighting === $other->orderWeighting;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function withId(int $id): OrderResponse
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

    public function getParentOrderId(): ?int
    {
        return $this->parentOrderId;
    }

    public function withParentOrderId(?int $parentOrderId): OrderResponse
    {
        $clone = clone $this;
        $clone->parentOrderId = $parentOrderId;
        return $clone;
    }

    public function getOrderTypeCode(): ?string
    {
        return $this->orderTypeCode;
    }

    public function withOrderTypeCode(string $orderTypeCode): OrderResponse
    {
        $clone = clone $this;
        $clone->orderTypeCode = $orderTypeCode;
        return $clone;
    }

    public function getOrderStatus(): ?OrderStatus
    {
        return $this->orderStatus;
    }

    public function withOrderStatus(OrderStatus $orderStatus): OrderResponse
    {
        $clone = clone $this;
        $clone->orderStatus = $orderStatus;
        return $clone;
    }

    public function getOrderRows(): ?RowCollection
    {
        return $this->orderRows;
    }

    public function withOrderRows(RowCollection $orderRows): OrderResponse
    {
        $clone = clone $this;
        $clone->orderRows = $orderRows;
        return $clone;
    }

    public function getParties(): ?Parties
    {
        return $this->parties;
    }

    public function withParties(Parties $parties): OrderResponse
    {
        $clone = clone $this;
        $clone->parties = $parties;
        return $clone;
    }

    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    public function withExternalRef(?string $externalRef): OrderResponse
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function withReference(?string $reference): OrderResponse
    {
        $clone = clone $this;
        $clone->reference = $reference;
        return $clone;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function withState(?State $state): OrderResponse
    {
        $clone = clone $this;
        $clone->state = $state;
        return $clone;
    }

    public function getTotalValue(): ?TotalValue
    {
        return $this->totalValue;
    }

    public function withTotalValue(?TotalValue $totalValue): OrderResponse
    {
        $clone = clone $this;
        $clone->totalValue = $totalValue;
        return $clone;
    }

    public function getOrderPaymentStatus(): ?string
    {
        return $this->orderPaymentStatus;
    }

    public function withOrderPaymentStatus(?string $orderPaymentStatus): OrderResponse
    {
        $clone = clone $this;
        $clone->orderPaymentStatus = $orderPaymentStatus;
        return $clone;
    }

    public function getStockStatusCode(): ?string
    {
        return $this->stockStatusCode;
    }

    public function withStockStatusCode(?string $stockStatusCode): OrderResponse
    {
        $clone = clone $this;
        $clone->stockStatusCode = $stockStatusCode;
        return $clone;
    }

    public function getAllocationStatusCode(): ?string
    {
        return $this->allocationStatusCode;
    }

    public function withAllocationStatusCode(?string $allocationStatusCode): OrderResponse
    {
        $clone = clone $this;
        $clone->allocationStatusCode = $allocationStatusCode;
        return $clone;
    }

    public function getShippingStatusCode(): ?string
    {
        return $this->shippingStatusCode;
    }

    public function withShippingStatusCode(?string $shippingStatusCode): OrderResponse
    {
        $clone = clone $this;
        $clone->shippingStatusCode = $shippingStatusCode;
        return $clone;
    }

    public function getPlacedOn(): ?string
    {
        return $this->placedOn;
    }

    public function withPlacedOn(?string $placedOn): OrderResponse
    {
        $clone = clone $this;
        $clone->placedOn = $placedOn;
        return $clone;
    }

    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    public function withCreatedOn(?string $createdOn): OrderResponse
    {
        $clone = clone $this;
        $clone->createdOn = $createdOn;
        return $clone;
    }

    public function getUpdatedOn(): ?string
    {
        return $this->updatedOn;
    }

    public function withUpdatedOn(?string $updatedOn): OrderResponse
    {
        $clone = clone $this;
        $clone->updatedOn = $updatedOn;
        return $clone;
    }

    public function getCreatedById(): ?string
    {
        return $this->createdById;
    }

    public function withCreatedById(?string $createdById): OrderResponse
    {
        $clone = clone $this;
        $clone->createdById = $createdById;
        return $clone;
    }

    public function getPriceListId(): ?string
    {
        return $this->priceListId;
    }

    public function withPriceListId(?string $priceListId): OrderResponse
    {
        $clone = clone $this;
        $clone->priceListId = $priceListId;
        return $clone;
    }

    public function getPriceModeCode(): ?string
    {
        return $this->priceModeCode;
    }

    public function withPriceModeCode(?string $priceModeCode): OrderResponse
    {
        $clone = clone $this;
        $clone->priceModeCode = $priceModeCode;
        return $clone;
    }

    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    public function withDelivery(?Delivery $delivery): OrderResponse
    {
        $clone = clone $this;
        $clone->delivery = $delivery;
        return $clone;
    }

    public function getInvoices(): ?InvoiceCollection
    {
        return $this->invoices;
    }

    public function withInvoices(?InvoiceCollection $invoices): OrderResponse
    {
        $clone = clone $this;
        $clone->invoices = $invoices;
        return $clone;
    }

    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    public function withWarehouseId(?int $warehouseId): OrderResponse
    {
        $clone = clone $this;
        $clone->warehouseId = $warehouseId;
        return $clone;
    }

    public function getAcknowledged(): ?int
    {
        return $this->acknowledged;
    }

    public function withAcknowledged(?int $acknowledged): OrderResponse
    {
        $clone = clone $this;
        $clone->acknowledged = $acknowledged;
        return $clone;
    }

    public function getCostPriceListId(): ?int
    {
        return $this->costPriceListId;
    }

    public function withCostPriceListId(?int $costPriceListId): OrderResponse
    {
        $clone = clone $this;
        $clone->costPriceListId = $costPriceListId;
        return $clone;
    }

    public function getHistoricalOrder(): ?bool
    {
        return $this->historicalOrder;
    }


    public function withHistoricalOrder(?bool $historicalOrder): OrderResponse
    {
        $clone = clone $this;
        $clone->historicalOrder = $historicalOrder;
        return $clone;
    }

    public function getIsDropship(): ?bool
    {
        return $this->isDropship;
    }

    public function withIsDropship(?bool $isDropship): OrderResponse
    {
        $clone = clone $this;
        $clone->isDropship = $isDropship;
        return $clone;
    }

    public function getOrderWeighting(): ?int
    {
        return $this->orderWeighting;
    }

    public function withOrderWeighting(?int $orderWeighting): OrderResponse
    {
        $clone = clone $this;
        $clone->orderWeighting = $orderWeighting;
        return $clone;
    }
}
