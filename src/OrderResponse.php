<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;
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

    public static function create(): ModelInterface
    {
        return new self();
    }
    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();

        $orderStatus = is_array($json['orderStatus']) ? $json['orderStatus'] : [];
        $orderRows = is_array($json['orderRows']) ? $json['orderRows'] : [];
        $state = is_array($json['state']) ? $json['state'] : [];
        $totalValue = is_array($json['totalValue']) ? $json['totalValue'] : [];
        $parties = is_array($json['parties']) ? $json['parties'] : [];
        $delivery = is_array($json['delivery']) ? $json['delivery'] : [];
        $invoices = is_array($json['invoices']) ? $json['invoices'] : [];

        $result->id = is_numeric($json['id']) ? (int)$json['id'] : null;
        $result->parentOrderId = is_numeric($json['parentOrderId']) ? (int)$json['parentOrderId'] : null;
        $result->orderTypeCode = is_string($json['orderTypeCode']) ? $json['orderTypeCode'] : null;
        $result->orderStatus = OrderStatus::fromJson($orderStatus);
        $result->orderRows = RowCollection::fromJson($orderRows);
        $result->externalRef = is_string($json['externalRef']) ? $json['externalRef'] : null;
        $result->reference = is_string($json['reference']) ? $json['reference'] : null;
        $result->state = State::fromJson($state);
        $result->totalValue = TotalValue::fromJson($totalValue);
        $result->parties = Parties::fromJson($parties);
        $result->orderPaymentStatus = is_string($json['orderPaymentStatus']) ? $json['orderPaymentStatus'] : null;
        $result->stockStatusCode = is_string($json['stockStatusCode']) ? $json['stockStatusCode'] : null;
        $result->allocationStatusCode = is_string($json['allocationStatusCode']) ? $json['allocationStatusCode'] : null;
        $result->shippingStatusCode = is_string($json['shippingStatusCode']) ? $json['shippingStatusCode'] : null;
        $result->placedOn = is_string($json['placedOn']) ? $json['placedOn'] : null;
        $result->createdOn = is_string($json['createdOn']) ? $json['createdOn'] : null;
        $result->updatedOn = is_string($json['updatedOn']) ? $json['updatedOn'] : null;
        $result->createdById = is_string($json['createdById']) ? $json['createdById'] : null;
        $result->priceListId = is_string($json['priceListId']) ? $json['priceListId'] : null;
        $result->priceModeCode = is_string($json['priceModeCode']) ? $json['priceModeCode'] : null;
        $result->delivery = Delivery::fromJson($delivery);
        $result->invoices = InvoiceCollection::fromJson($invoices);
        $result->warehouseId = is_numeric($json['warehouseId']) ? (int)$json['warehouseId'] : null;
        $result->acknowledged = is_numeric($json['acknowledged']) ? (int)$json['acknowledged'] : null;
        $result->costPriceListId = is_numeric($json['costPriceListId']) ? (int)$json['costPriceListId'] : null;
        $result->historicalOrder = is_bool($json['historicalOrder']) && $json['historicalOrder'];
        $result->isDropship = is_bool($json['isDropship']) && $json['isDropship'];
        $result->orderWeighting = is_numeric($json['orderWeighting']) ? (int)$json['orderWeighting'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $orderStatus = is_null($this->getOrderStatus()) ? [] : $this->getOrderStatus()->toJson();
        $orderRows = is_null($this->getOrderRows()) ? [] : $this->getOrderRows()->toJson();
        $state = is_null($this->getState()) ? [] : $this->getState()->toJson();
        $totalValue = is_null($this->getTotalValue()) ? [] : $this->getTotalValue()->toJson();
        $parties = is_null($this->getParties()) ? [] : $this->getParties()->toJson();
        $delivery = is_null($this->getDelivery()) ? [] : $this->getDelivery()->toJson();
        $invoices = is_null($this->getInvoices()) ? [] : $this->getInvoices()->toJson();

        return [
            'id' => $this->getId(),
            'parentOrderId' => $this->getParentOrderId(),
            'orderTypeCode' => $this->getOrderTypeCode(),
            'orderStatus' => $orderStatus,
            'orderRows' => $orderRows,
            'externalRef' => $this->getExternalRef(),
            'reference' => $this->getReference(),
            'state' => $state,
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
            'delivery' => $delivery,
            'invoices' => $invoices,
            'totalValue' => $totalValue,
            'parties' => $parties,
            'warehouseId' => $this->getWarehouseId(),
            'acknowledged' => $this->getAcknowledged(),
            'costPriceListId' => $this->getCostPriceListId(),
            'historicalOrder' => $this->getHistoricalOrder(),
            'isDropship' => $this->getIsDropship(),
            'orderWeighting' => $this->getOrderWeighting()
        ];
    }

    /**
     * @param ModelInterface $orderResponseToCompare
     * @return bool
     */
    public function equals(ModelInterface $orderResponseToCompare): bool
    {
        if (!is_null($this->getParties())
            && !is_null($orderResponseToCompare->getParties())
            && !$this->getParties()->equals($orderResponseToCompare->getParties())) {
            return false;
        }
        return $this->toJson() === $orderResponseToCompare->toJson();
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
