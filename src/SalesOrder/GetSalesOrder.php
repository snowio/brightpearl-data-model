<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

use SnowIO\BrightpearlDataModel\ModelInterface;

class GetSalesOrder implements ModelInterface
{
    /** @var int|null $id */
    private $id;
    /** @var Customer|null */
    private $customer;
    /** @var Billing|null */
    private $billing;
    /** @var string|null $ref */
    private $ref;
    /** @var string|null $externalRef */
    private $externalRef;
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
    /** @var int|null $staffOwnerId */
    private $staffOwnerId;
    /** @var int|null $projectId */
    private $projectId;
    /** @var int|null $channelId */
    private $channelId;
    /** @var int|null $leadSourceId */
    private $leadSourceId;
    /** @var int|null $teamId */
    private $teamId;
    /** @var int|null $priceListId */
    private $priceListId;
    /** @var string|null $priceModeCode */
    private $priceModeCode;
    /** @var Currency|null $currency */
    private $currency;
    /** @var Delivery|null $delivery */
    private $delivery;
    /** @var Get\RowCollection|null $rows */
    private $rows;
    /** @var Total $total */
    private $total;
    /** @var string|null $orderPaymentStatus */
    private $orderPaymentStatus;
    /** @var string|null $allocationStatusCode */
    private $allocationStatusCode;
    /** @var string|null $stockStatusCode */
    private $stockStatusCode;
    /** @var string|null $shippingStatusCode */
    private $shippingStatusCode;
    /** @var int|null $createdBy */
    private $createdBy;
    /** @var string|null $createdOn */
    private $createdOn;
    /** @var string|null $updatedOn */
    private $updatedOn;
    /** @var Invoice|null $invoice */
    private $invoice;
    /** @var int|null $orderWeighting */
    private $orderWeighting;
    /** @var int|null $costPriceListId */
    private $costPriceListId;
    /** @var bool|null $isCanceled */
    private $isCanceled;
    /** @var int|null $installedIntegrationInstanceId */
    private $installedIntegrationInstanceId;
    /** @var int|null $customerId */
    private $customerId;

    public function __construct()
    {
        $this->total = Total::create();
        $this->invoice = Invoice::create();
        $this->customer = Customer::create();
        $this->delivery = Delivery::create();
        $this->currency = Currency::create();
        $this->billing = Billing::create();
        $this->rows = Get\RowCollection::of([]);
    }

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->id = $json['id'] ?? null;
        $result->ref = $json['ref'] ?? null;
        $result->externalRef = $json['externalRef'] ?? null;
        $result->placedOn = $json['placedOn'] ?? null;
        $result->taxDate = $json['taxDate'] ?? null;
        $result->parentId = $json['parentId'] ?? null;
        $result->statusId = $json['statusId'] ?? null;
        $result->warehouseId = $json['warehouseId'] ?? null;
        $result->staffOwnerId = $json['staffOwnerId'] ?? null;
        $result->projectId = $json['projectId'] ?? null;
        $result->channelId = $json['channelId'] ?? null;
        $result->leadSourceId = $json['leadSourceId'] ?? null;
        $result->teamId = $json['teamId'] ?? null;
        $result->priceListId = $json['priceListId'] ?? null;
        $result->priceModeCode = $json['priceModeCode'] ?? null;
        $result->customer = Customer::fromJson($json['customer'] ?? []);
        $result->billing = Billing::fromJson($json['billing'] ?? []);
        $result->currency = Currency::fromJson($json['currency'] ?? []);
        $result->delivery = Delivery::fromJson($json['delivery'] ?? []);
        $result->rows = Get\RowCollection::fromJson($json['rows'] ?? []);
        $result->total = Total::fromJson($json['total'] ?? []);
        $result->invoice = Invoice::fromJson($json['invoice'] ?? []);
        $result->orderPaymentStatus = $json['orderPaymentStatus'] ?? null;
        $result->allocationStatusCode = $json['allocationStatusCode'] ?? null;
        $result->stockStatusCode = $json['stockStatusCode'] ?? null;
        $result->shippingStatusCode = $json['shippingStatusCode'] ?? null;
        $result->createdBy = $json['createdBy'] ?? null;
        $result->createdOn = $json['createdOn'] ?? null;
        $result->updatedOn = $json['updatedOn'] ?? null;
        $result->orderWeighting = $json['orderWeighting'] ?? null;
        $result->costPriceListId = $json['costPriceListId'] ?? null;
        $result->isCanceled = $json['isCanceled'] ?? null;
        $result->installedIntegrationInstanceId = $json['installedIntegrationInstanceId'] ?? null;
        $result->customerId = $json['customerId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getId(),
            'customer' => $this->getCustomer()->toJson(),
            'billing' => $this->getBilling()->toJson(),
            'ref' => $this->getRef(),
            'externalRef' => $this->getExternalRef(),
            'placedOn' => $this->getPlacedOn(),
            'taxDate' => $this->getTaxDate(),
            'parentId' => $this->getParentId(),
            'statusId' => $this->getStatusId(),
            'warehouseId' => $this->getWarehouseId(),
            'staffOwnerId' => $this->getStaffOwnerId(),
            'projectId' => $this->getProjectId(),
            'channelId' => $this->getChannelId(),
            'leadSourceId' => $this->getLeadSourceId(),
            'teamId' => $this->getTeamId(),
            'priceListId' => $this->getPriceListId(),
            'priceModeCode' => $this->getPriceModeCode(),
            'currency' => $this->getCurrency()->toJson(),
            'delivery' => $this->getDelivery()->toJson(),
            'rows' => $this->getRows()->toJson(),
            'total' => $this->total->hasData() ? $this->getTotal()->toJson() : null,
            "orderPaymentStatus" => $this->getOrderPaymentStatus(),
            "allocationStatusCode" => $this->getAllocationStatusCode(),
            "stockStatusCode" => $this->getStockStatusCode(),
            "shippingStatusCode" => $this->getShippingStatusCode(),
            "createdBy" => $this->getCreatedBy(),
            "createdOn" => $this->getCreatedOn(),
            "updatedOn" => $this->getUpdatedOn(),
            'invoice' => $this->invoice->hasData() ? $this->invoice->toJson() : null,
            "orderWeighting" => $this->getOrderWeighting(),
            "costPriceListId" => $this->getCostPriceListId(),
            "isCanceled" => $this->getIsCanceled(),
            "installedIntegrationInstanceId" => $this->getInstalledIntegrationInstanceId(),
            "customerId" => $this->getCustomerId(),
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return ($other instanceof GetSalesOrder) &&
            ($this->id === $other->id) &&
            ($this->customer->equals($other->customer)) &&
            ($this->billing->equals($other->billing)) &&
            ($this->ref === $other->ref) &&
            ($this->externalRef === $other->externalRef) &&
            ($this->placedOn === $other->placedOn) &&
            ($this->taxDate === $other->taxDate) &&
            ($this->parentId === $other->parentId) &&
            ($this->statusId === $other->statusId) &&
            ($this->warehouseId === $other->warehouseId) &&
            ($this->staffOwnerId === $other->staffOwnerId) &&
            ($this->projectId === $other->projectId) &&
            ($this->channelId === $other->channelId) &&
            ($this->leadSourceId === $other->leadSourceId) &&
            ($this->teamId === $other->teamId) &&
            ($this->priceListId === $other->priceListId) &&
            ($this->priceModeCode === $other->priceModeCode) &&
            ($this->currency->equals($other->currency)) &&
            ($this->delivery->equals($other->delivery)) &&
            ($this->rows->equals($other->rows)) &&
            ($this->total->equals($other->total)) &&
            ($this->orderPaymentStatus === $other->orderPaymentStatus) &&
            ($this->allocationStatusCode === $other->allocationStatusCode) &&
            ($this->stockStatusCode === $other->stockStatusCode) &&
            ($this->shippingStatusCode === $other->shippingStatusCode) &&
            ($this->createdBy === $other->createdBy) &&
            ($this->createdOn === $other->createdOn) &&
            ($this->updatedOn === $other->updatedOn) &&
            ($this->invoice->equals($other->invoice)) &&
            ($this->orderWeighting === $other->orderWeighting) &&
            ($this->costPriceListId === $other->costPriceListId) &&
            ($this->isCanceled === $other->isCanceled) &&
            ($this->installedIntegrationInstanceId === $other->installedIntegrationInstanceId) &&
            ($this->customerId === $other->customerId);
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function withCustomer(Customer $customer): GetSalesOrder
    {
        $clone = clone $this;
        $clone->customer = $customer;
        return $clone;
    }

    public function getBilling(): ?Billing
    {
        return $this->billing;
    }

    public function withBilling(Billing $billing): GetSalesOrder
    {
        $clone = clone $this;
        $clone->billing = $billing;
        return $clone;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function withInvoice(Invoice $invoice): GetSalesOrder
    {
        $clone = clone $this;
        $clone->invoice = $invoice;
        return $clone;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function withId(?int $id): self
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function withRef(?string $ref): GetSalesOrder
    {
        $clone = clone $this;
        $clone->ref = $ref;
        return $clone;
    }

    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    public function withExternalRef(?string $externalRef): GetSalesOrder
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }

    public function getTaxDate(): ?string
    {
        return $this->taxDate;
    }

    public function withTaxDate(?string $taxDate): GetSalesOrder
    {
        $clone = clone $this;
        $clone->taxDate = $taxDate;
        return $clone;
    }

    public function getPlacedOn(): ?string
    {
        return $this->placedOn;
    }

    public function withPlacedOn(?string $placedOn): GetSalesOrder
    {
        $clone = clone $this;
        $clone->placedOn = $placedOn;
        return $clone;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function withParentId(?int $parentId): GetSalesOrder
    {
        $clone = clone $this;
        $clone->parentId = $parentId;
        return $clone;
    }

    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    public function withStatusId(?int $statusId): GetSalesOrder
    {
        $clone = clone $this;
        $clone->statusId = $statusId;
        return $clone;
    }

    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    public function withWarehouseId(?int $warehouseId): GetSalesOrder
    {
        $clone = clone $this;
        $clone->warehouseId = $warehouseId;
        return $clone;
    }

    public function getStaffOwnerId(): ?int
    {
        return $this->staffOwnerId;
    }

    public function withStaffOwnerId(?int $staffOwnerId): GetSalesOrder
    {
        $clone = clone $this;
        $clone->staffOwnerId = $staffOwnerId;
        return $clone;
    }

    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    public function withProjectId(?int $projectId): GetSalesOrder
    {
        $clone = clone $this;
        $clone->projectId = $projectId;
        return $clone;
    }

    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    public function withChannelId(?int $channelId): GetSalesOrder
    {
        $clone = clone $this;
        $clone->channelId = $channelId;
        return $clone;
    }

    public function getInstalledIntegrationInstanceId(): ?int
    {
        return $this->installedIntegrationInstanceId;
    }

    public function withInstalledIntegrationInstanceId(?int $installedIntegrationInstanceId): GetSalesOrder
    {
        $clone = clone $this;
        $clone->installedIntegrationInstanceId = $installedIntegrationInstanceId;
        return $clone;
    }

    public function getLeadSourceId(): ?int
    {
        return $this->leadSourceId;
    }

    public function withLeadSourceId(?int $leadSourceId): GetSalesOrder
    {
        $clone = clone $this;
        $clone->leadSourceId = $leadSourceId;
        return $clone;
    }

    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    public function withTeamId(?int $teamId): GetSalesOrder
    {
        $clone = clone $this;
        $clone->teamId = $teamId;
        return $clone;
    }

    public function getPriceListId(): ?int
    {
        return $this->priceListId;
    }

    public function withPriceListId(?int $priceListId): GetSalesOrder
    {
        $clone = clone $this;
        $clone->priceListId = $priceListId;
        return $clone;
    }

    public function getPriceModeCode(): ?string
    {
        return $this->priceModeCode;
    }

    public function withPriceModeCode(?string $priceModeCode): GetSalesOrder
    {
        $clone = clone $this;
        $clone->priceModeCode = $priceModeCode;
        return $clone;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function withCurrency(Currency $currency): GetSalesOrder
    {
        $clone = clone $this;
        $clone->currency = $currency;
        return $clone;
    }

    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    public function withDelivery(Delivery $delivery): GetSalesOrder
    {
        $clone = clone $this;
        $clone->delivery = $delivery;
        return $clone;
    }

    public function getRows(): ?Get\RowCollection
    {
        return $this->rows;
    }

    public function withRows(?Get\RowCollection $rows): GetSalesOrder
    {
        $clone = clone $this;
        $clone->rows = $rows;
        return $clone;
    }

    public function getTotal(): ?Total
    {
        return $this->total;
    }

    public function withTotal(?Total $total): GetSalesOrder
    {
        $clone = clone $this;
        $clone->total = $total;
        return $clone;
    }


    public function getOrderPaymentStatus(): ?string
    {
        return $this->orderPaymentStatus;
    }

    public function withOrderPaymentStatus(?string $orderPaymentStatus): self
    {
        $clone = clone $this;
        $clone->orderPaymentStatus = $orderPaymentStatus;
        return $clone;
    }

    public function getAllocationStatusCode(): ?string
    {
        return $this->allocationStatusCode;
    }

    public function withAllocationStatusCode(?string $allocationStatusCode): self
    {
        $clone = clone $this;
        $clone->allocationStatusCode = $allocationStatusCode;
        return $clone;
    }

    public function getStockStatusCode(): ?string
    {
        return $this->stockStatusCode;
    }

    public function withStockStatusCode(?string $stockStatusCode): self
    {
        $clone = clone $this;
        $clone->stockStatusCode = $stockStatusCode;
        return $clone;
    }

    public function getShippingStatusCode(): ?string
    {
        return $this->shippingStatusCode;
    }

    public function withShippingStatusCode(?string $shippingStatusCode): self
    {
        $clone = clone $this;
        $clone->shippingStatusCode = $shippingStatusCode;
        return $clone;
    }

    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    public function withCreatedBy(?int $createdBy): self
    {
        $clone = clone $this;
        $clone->createdBy = $createdBy;
        return $clone;
    }

    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    public function withCreatedOn(?string $createdOn): self
    {
        $clone = clone $this;
        $clone->createdOn = $createdOn;
        return $clone;
    }

    public function getUpdatedOn(): ?string
    {
        return $this->updatedOn;
    }

    public function withUpdatedOn(?string $updatedOn): self
    {
        $clone = clone $this;
        $clone->updatedOn = $updatedOn;
        return $clone;
    }

    public function getOrderWeighting(): ?int
    {
        return $this->orderWeighting;
    }

    public function withOrderWeighting(?int $orderWeighting): self
    {
        $clone = clone $this;
        $clone->orderWeighting = $orderWeighting;
        return $clone;
    }

    public function getCostPriceListId(): ?int
    {
        return $this->costPriceListId;
    }

    public function withCostPriceListId(?int $costPriceListId): self
    {
        $clone = clone $this;
        $clone->costPriceListId = $costPriceListId;
        return $clone;
    }

    public function getIsCanceled(): ?bool
    {
        return $this->isCanceled;
    }

    public function withIsCanceled(?bool $isCanceled): self
    {
        $clone = clone $this;
        $clone->isCanceled = $isCanceled;
        return $clone;
    }

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    public function withCustomerId(?int $customerId): self
    {
        $clone = clone $this;
        $clone->customerId = $customerId;
        return $clone;
    }
}
