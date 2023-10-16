<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\SalesOrderResponse\Billing;
use SnowIO\BrightpearlDataModel\SalesOrderResponse\Currency;
use SnowIO\BrightpearlDataModel\SalesOrderResponse\Customer;
use SnowIO\BrightpearlDataModel\SalesOrderResponse\Delivery;
use SnowIO\BrightpearlDataModel\SalesOrderResponse\Invoice;
use SnowIO\BrightpearlDataModel\SalesOrderResponse\RowCollection;
use SnowIO\BrightpearlDataModel\SalesOrderResponse\Total;

class SalesOrderResponse implements ModelInterface
{
    /** @var int|null $id */
    private $id;
    /** @var string|null $ref */
    private $ref;
    /** @var string|null $placedOn */
    private $placedOn;
    /** @var string|null $taxDate */
    private $taxDate;
    /** @var int|null $parentId */
    private $parentId;
    /** @var int|null $statusId */
    private $statusId;
    /** @var int|null $warehouseId */
    private $warehouseId;
    /** @var int|null $channelId */
    private $channelId;
    /** @var int|null $staffOwnerId */
    private $staffOwnerId;
    /** @var int|null $projectId */
    private $projectId;
    /** @var int|null $leadSourceId */
    private $leadSourceId;
    /** @var int|null $teamId */
    private $teamId;
    /** @var int|null $priceListId */
    private $priceListId;
    /** @var string|null $priceModeCode */
    private $priceModeCode;
    /** @var Billing|null $billing */
    private $billing;
    /** @var Customer|null $customer */
    private $customer;
    /** @var Delivery|null $delivery */
    private $delivery;
    /** @var Currency|null $currency */
    private $currency;
    /** @var Invoice|null $invoice */
    private $invoice;
    /** @var RowCollection|null $rows */
    private $rows;
    /** @var Total|null $total */
    private $total;
    /** @var string|null $stockStatusCode */
    private $stockStatusCode;
    /** @var int|null $createdBy */
    private $createdBy;
    /** @var string|null $createdOn */
    private $createdOn;
    /** @var string|null $updatedOn */
    private $updatedOn;
    /** @var int|null $orderWeighting */
    private $orderWeighting;
    /** @var int|null $costPriceListId */
    private $costPriceListId;
    /** @var int|null $customerId */
    private $customerId;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    private function __construct()
    {
        $this->customer = Customer::create();
        $this->billing = Billing::create();
        $this->delivery = Delivery::create();
        $this->currency = Currency::create();
        $this->total = Total::create();
    }

    /**
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->id = $json['id'] ?? null;
        $result->customer = Customer::fromJson($json['customer'] ?? []);
        $result->billing = Billing::fromJson($json['billing'] ?? []);
        $result->ref = $json['ref'] ?? null;
        $result->placedOn = $json['placedOn'] ?? null;
        $result->parentId = $json['parentId'] ?? null;
        $result->statusId = $json['statusId'] ?? null;
        $result->warehouseId = $json['warehouseId'] ?? null;
        $result->channelId = $json['channelId'] ?? null;
        $result->staffOwnerId = $json['staffOwnerId'] ?? null;
        $result->projectId = $json['projectId'] ?? null;
        $result->leadSourceId = $json['leadSourceId'] ?? null;
        $result->teamId = $json['teamId'] ?? null;
        $result->priceListId = $json['priceListId'] ?? null;
        $result->priceModeCode = $json['priceModeCode'] ?? null;
        $result->delivery = Delivery::fromJson($json['delivery'] ?? []);
        $result->currency = Currency::fromJson($json['currency'] ?? []);
        $result->rows = RowCollection::fromJson($json['rows'] ?? []);
        $result->total = Total::fromJson($json['total'] ?? []);
        $result->stockStatusCode = $json['stockStatusCode'] ?? null;
        $result->createdBy = $json['createdBy'] ?? null;
        $result->createdOn = $json['createdOn'] ?? null;
        $result->updatedOn = $json['updatedOn'] ?? null;
        $result->invoice = Invoice::fromJson($json['invoice'] ?? []);
        $result->orderWeighting = $json['orderWeighting'] ?? null;
        $result->costPriceListId = $json['costPriceListId'] ?? null;
        $result->customerId = $json['customerId'] ?? null;
        $result->taxDate = $json['taxDate'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'customer' => $this->getCustomer() ? $this->getCustomer()->toJson() : null,
            'billing' => $this->getBilling() ? $this->getBilling()->toJson() : null,
            'ref' => $this->getRef(),
            'placedOn' => $this->getPlacedOn(),
            'parentId' => $this->getParentId(),
            'statusId' => $this->getStatusId(),
            'warehouseId' => $this->getWarehouseId(),
            'channelId' => $this->getChannelId(),
            'staffOwnerId' => $this->getStaffOwnerId(),
            'projectId' => $this->getProjectId(),
            'leadSourceId' => $this->getLeadSourceId(),
            'teamId' => $this->getTeamId(),
            'priceListId' => $this->getPriceListId(),
            'priceModeCode' => $this->getPriceModeCode(),
            'delivery' => $this->getDelivery() ? $this->getDelivery()->toJson() : null,
            'currency' => $this->getCurrency() ? $this->getCurrency()->toJson() : null,
            'rows' => $this->getRows()->toJson(),
            'total' => $this->getTotal() ? $this->getTotal()->toJson() : null,
            'stockStatusCode' => $this->getStockStatusCode(),
            'createdBy' => $this->getCreatedBy(),
            'createdOn' => $this->getCreatedOn(),
            'updatedOn' => $this->getUpdatedOn(),
            'invoice' => $this->getInvoice() ? $this->getInvoice()->toJson() : null,
            'orderWeighting' => $this->getOrderWeighting(),
            'costPriceListId' => $this->getCostPriceListId(),
            'customerId' => $this->getCustomerId(),
            'taxDate' => $this->getTaxDate(),
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof SalesOrderResponse &&
            $this->id === $other->id &&
            $this->customer->equals($other->customer) &&
            $this->billing->equals($other->billing) &&
            $this->ref === $other->ref &&
            $this->placedOn === $other->placedOn &&
            $this->parentId === $other->parentId &&
            $this->statusId === $other->statusId &&
            $this->warehouseId === $other->warehouseId &&
            $this->channelId === $other->channelId &&
            $this->staffOwnerId === $other->staffOwnerId &&
            $this->projectId === $other->projectId &&
            $this->leadSourceId === $other->leadSourceId &&
            $this->teamId === $other->teamId &&
            $this->priceListId === $other->priceListId &&
            $this->priceModeCode === $other->priceModeCode &&
            $this->delivery->equals($other->delivery) &&
            $this->currency->equals($other->currency) &&
            $this->rows->equals($other->rows) &&
            $this->total->equals($other->total) &&
            $this->stockStatusCode === $other->stockStatusCode &&
            $this->createdBy === $other->createdBy &&
            $this->createdOn === $other->createdOn &&
            $this->updatedOn === $other->updatedOn &&
            $this->invoice->equals($other->invoice) &&
            $this->orderWeighting === $other->orderWeighting &&
            $this->costPriceListId === $other->costPriceListId &&
            $this->customerId === $other->customerId &&
            $this->taxDate === $other->taxDate;
    }

    public function withId(?int $id): SalesOrderResponse
    {
        $result = clone $this;
        $result->id = $id;
        return $result;
    }

    public function withCustomer(?Customer $customer): SalesOrderResponse
    {
        $result = clone $this;
        $result->customer = $customer;
        return $result;
    }

    public function withBilling(?Billing $billing): SalesOrderResponse
    {
        $result = clone $this;
        $result->billing = $billing;
        return $result;
    }

    public function withRef(?string $ref): SalesOrderResponse
    {
        $result = clone $this;
        $result->ref = $ref;
        return $result;
    }

    public function withPlacedOn(?string $placedOn): SalesOrderResponse
    {
        $result = clone $this;
        $result->placedOn = $placedOn;
        return $result;
    }

    public function withTaxDate(?string $taxDate): SalesOrderResponse
    {
        $result = clone $this;
        $result->taxDate = $taxDate;
        return $result;
    }

    public function withParentId(?int $parentId): SalesOrderResponse
    {
        $result = clone $this;
        $result->parentId = $parentId;
        return $result;
    }

    public function withStatusId(?int $statusId): SalesOrderResponse
    {
        $result = clone $this;
        $result->statusId = $statusId;
        return $result;
    }

    public function withWarehouseId(?int $warehouseId): SalesOrderResponse
    {
        $result = clone $this;
        $result->warehouseId = $warehouseId;
        return $result;
    }

    public function withChannelId(?int $channelId): SalesOrderResponse
    {
        $result = clone $this;
        $result->channelId = $channelId;
        return $result;
    }

    public function withStaffOwnerId(?int $staffOwnerId): SalesOrderResponse
    {
        $result = clone $this;
        $result->staffOwnerId = $staffOwnerId;
        return $result;
    }

    public function withProjectId(?int $projectId): SalesOrderResponse
    {
        $result = clone $this;
        $result->projectId = $projectId;
        return $result;
    }

    public function withLeadSourceId(?int $leadSourceId): SalesOrderResponse
    {
        $result = clone $this;
        $result->leadSourceId = $leadSourceId;
        return $result;
    }

    public function withTeamId(?int $teamId): SalesOrderResponse
    {
        $result = clone $this;
        $result->teamId = $teamId;
        return $result;
    }

    public function withPriceListId(?int $priceListId): SalesOrderResponse
    {
        $result = clone $this;
        $result->priceListId = $priceListId;
        return $result;
    }

    public function withPriceModeCode(?string $priceModeCode): SalesOrderResponse
    {
        $result = clone $this;
        $result->priceModeCode = $priceModeCode;
        return $result;
    }

    public function withCurrency(?Currency $currency): SalesOrderResponse
    {
        $result = clone $this;
        $result->currency = $currency;
        return $result;
    }

    public function withDelivery(?Delivery $delivery): SalesOrderResponse
    {
        $result = clone $this;
        $result->delivery = $delivery;
        return $result;
    }

    public function withRows(?RowCollection $rows): SalesOrderResponse
    {
        $result = clone $this;
        $result->rows = $rows;
        return $result;
    }

    public function withTotal(?Total $total): SalesOrderResponse
    {
        $result = clone $this;
        $result->total = $total;
        return $result;
    }

    public function withStockStatusCode(?string $stockStatusCode): SalesOrderResponse
    {
        $result = clone $this;
        $result->stockStatusCode = $stockStatusCode;
        return $result;
    }

    public function withCreatedBy(?int $createdBy): SalesOrderResponse
    {
        $result = clone $this;
        $result->createdBy = $createdBy;
        return $result;
    }

    public function withCreatedOn(?string $createdOn): SalesOrderResponse
    {
        $result = clone $this;
        $result->createdOn = $createdOn;
        return $result;
    }

    public function withUpdatedOn(?string $updatedOn): SalesOrderResponse
    {
        $result = clone $this;
        $result->updatedOn = $updatedOn;
        return $result;
    }

    public function withInvoice(?Invoice $invoice): SalesOrderResponse
    {
        $result = clone $this;
        $result->invoice = $invoice;
        return $result;
    }

    public function withOrderWeighting(?int $orderWeighting): SalesOrderResponse
    {
        $result = clone $this;
        $result->orderWeighting = $orderWeighting;
        return $result;
    }

    public function withCostPriceListId(?int $costPriceListId): SalesOrderResponse
    {
        $result = clone $this;
        $result->costPriceListId = $costPriceListId;
        return $result;
    }

    public function withCustomerId(?int $customerId): SalesOrderResponse
    {
        $result = clone $this;
        $result->customerId = $customerId;
        return $result;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function getBilling(): ?Billing
    {
        return $this->billing;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function getPlacedOn(): ?string
    {
        return $this->placedOn;
    }

    public function getTaxDate(): ?string
    {
        return $this->taxDate;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    public function getStaffOwnerId(): ?int
    {
        return $this->staffOwnerId;
    }

    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    public function getLeadSourceId(): ?int
    {
        return $this->leadSourceId;
    }

    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    public function getPriceListId(): ?int
    {
        return $this->priceListId;
    }

    public function getPriceModeCode(): ?string
    {
        return $this->priceModeCode;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    public function getRows(): ?RowCollection
    {
        return $this->rows;
    }

    public function getTotal(): ?Total
    {
        return $this->total;
    }

    public function getStockStatusCode(): ?string
    {
        return $this->stockStatusCode;
    }

    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    public function getUpdatedOn(): ?string
    {
        return $this->updatedOn;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function getOrderWeighting(): ?int
    {
        return $this->orderWeighting;
    }

    public function getCostPriceListId(): ?int
    {
        return $this->costPriceListId;
    }

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }
}
