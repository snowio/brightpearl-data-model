<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

use SnowIO\BrightpearlDataModel\ModelInterface;

class PostSalesOrder implements ModelInterface
{
    /** @var string|null $externalRef */
    private $externalRef;
    /** @var Customer|null */
    private $customer;
    /** @var Billing|null */
    private $billing;
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
    /** @var RowCollection|null $rows */
    private $rows;
    /** @var Total|null $total */
    private $total;

    /** @var string|null $orderPaymentStatus */
    private $orderPaymentStatus;
    /** @var string|null $allocationStatusCode */
    private $allocationStatusCode;
    /** @var string|null $stockStatusCode */
    private $stockStatusCode;
    /** @var string|null $shippingStatusCode */
    private $shippingStatusCode;
    /** @var Invoice|null $invoice */
    private $invoice;
    /** @var int|null $orderWeighting */
    private $orderWeighting;
    /** @var int|null $costPriceListId */
    private $costPriceListId;
    /** @var int|null $installedIntegrationInstanceId */
    private $installedIntegrationInstanceId;
    /** @var int|null $customerId */
    private $customerId;

    public function __construct()
    {
        $this->customer = Customer::create();
        $this->billing = Billing::create();
        $this->currency = Currency::create();
        $this->delivery = Delivery::create();
        $this->rows = RowCollection::of([]);
        $this->total = Total::create();
    }

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();

        $result->externalRef = $json['externalRef'] ?? null;
        $result->ref = $json['ref'] ?? null;
        $result->placedOn = $json['placedOn'] ?? null;
        $result->taxDate = $json['taxDate'] ?? null;
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
        $result->rows = RowCollection::fromJson($json['rows'] ?? []);
        $result->total = Total::fromJson($json['total'] ?? []);

        $result->installedIntegrationInstanceId = $json['installedIntegrationInstanceId'] ?? null;

        return $result;
    }

    public function toJson(): array
    {
        return [
            'customer' => $this->getCustomer()->toJson(),
            'externalRef' => $this->getExternalRef(),
            'ref' => $this->getRef(),
            'placedOn' => $this->getPlacedOn(),
            'taxDate' => $this->getTaxDate(),
            "installedIntegrationInstanceId" => $this->getInstalledIntegrationInstanceId(),
            'warehouseId' => $this->getWarehouseId(),
            'projectId' => $this->getProjectId(),
            'statusId' => $this->getStatusId(),
            'channelId' => $this->getChannelId(),
            'leadSourceId' => $this->getLeadSourceId(),
            'staffOwnerId' => $this->getStaffOwnerId(),
            'teamId' => $this->getTeamId(),
            'priceListId' => $this->getPriceListId(),
            'priceModeCode' => $this->getPriceModeCode(),
            'currency' => $this->getCurrency()->toJson(),
            'delivery' => $this->getDelivery()->toJson(),
            'billing' => $this->getBilling()->toJson(),
            'rows' => $this->getRows()->toJson(),
        ];
    }

    public function equals($other): bool
    {
        return ($other instanceof PostSalesOrder) &&
            ($this->ref === $other->ref) &&
            ($this->customer->equals($other->customer));
//            ($this->delivery->equals($other->delivery)) &&
//            ($this->billing->equals($other->billing)) &&
//            ($this->invoice->equals($other->invoice)) &&
//            ($this->currency->equals($other->currency)) &&
//            ($this->rows->equals($other->rows)) &&
//            ($this->customer === $other->customer) &&
//            ($this->externalRef === $other->externalRef);
//            ($this->placedOn === $other->placedOn) &&
//            ($this->taxDate === $other->taxDate) &&
//            ($this->installedIntegrationInstanceId === $other->installedIntegrationInstanceId) &&
//            ($this->warehouseId === $other->warehouseId) &&
//            ($this->projectId === $other->projectId) &&
//            ($this->statusId === $other->statusId) &&
//            ($this->channelId === $other->channelId) &&
//            ($this->leadSourceId === $other->leadSourceId) &&
//            ($this->staffOwnerId === $other->staffOwnerId) &&
//            ($this->teamId === $other->teamId) &&
//            ($this->priceListId === $other->priceListId) &&
//            ($this->priceModeCode === $other->priceModeCode);
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function withCustomer(Customer $customer): self
    {
        $clone = clone $this;
        $clone->customer = $customer;
        return $clone;
    }

    public function getBilling(): ?Billing
    {
        return $this->billing;
    }

    public function withBilling(Billing $billing): self
    {
        $clone = clone $this;
        $clone->billing = $billing;
        return $clone;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function withInvoice(Invoice $invoice): self
    {
        $clone = clone $this;
        $clone->invoice = $invoice;
        return $clone;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function withRef(?string $ref): self
    {
        $clone = clone $this;
        $clone->ref = $ref;
        return $clone;
    }

    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    public function withExternalRef(?string $externalRef): self
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }

    public function getTaxDate(): ?string
    {
        return $this->taxDate;
    }

    public function withTaxDate(?string $taxDate): self
    {
        $clone = clone $this;
        $clone->taxDate = $taxDate;
        return $clone;
    }

    public function getPlacedOn(): ?string
    {
        return $this->placedOn;
    }

    public function withPlacedOn(?string $placedOn): self
    {
        $clone = clone $this;
        $clone->placedOn = $placedOn;
        return $clone;
    }

    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    public function withStatusId(?int $statusId): self
    {
        $clone = clone $this;
        $clone->statusId = $statusId;
        return $clone;
    }

    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    public function withWarehouseId(?int $warehouseId): self
    {
        $clone = clone $this;
        $clone->warehouseId = $warehouseId;
        return $clone;
    }

    public function getStaffOwnerId(): ?int
    {
        return $this->staffOwnerId;
    }

    public function withStaffOwnerId(?int $staffOwnerId): self
    {
        $clone = clone $this;
        $clone->staffOwnerId = $staffOwnerId;
        return $clone;
    }

    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    public function withProjectId(?int $projectId): self
    {
        $clone = clone $this;
        $clone->projectId = $projectId;
        return $clone;
    }

    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    public function withChannelId(?int $channelId): self
    {
        $clone = clone $this;
        $clone->channelId = $channelId;
        return $clone;
    }

    public function getInstalledIntegrationInstanceId(): ?int
    {
        return $this->installedIntegrationInstanceId;
    }

    public function withInstalledIntegrationInstanceId(?int $installedIntegrationInstanceId): self
    {
        $clone = clone $this;
        $clone->installedIntegrationInstanceId = $installedIntegrationInstanceId;
        return $clone;
    }

    public function getLeadSourceId(): ?int
    {
        return $this->leadSourceId;
    }

    public function withLeadSourceId(?int $leadSourceId): self
    {
        $clone = clone $this;
        $clone->leadSourceId = $leadSourceId;
        return $clone;
    }

    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    public function withTeamId(?int $teamId): self
    {
        $clone = clone $this;
        $clone->teamId = $teamId;
        return $clone;
    }

    public function getPriceListId(): ?int
    {
        return $this->priceListId;
    }

    public function withPriceListId(?int $priceListId): self
    {
        $clone = clone $this;
        $clone->priceListId = $priceListId;
        return $clone;
    }

    public function getPriceModeCode(): ?string
    {
        return $this->priceModeCode;
    }

    public function withPriceModeCode(?string $priceModeCode): self
    {
        $clone = clone $this;
        $clone->priceModeCode = $priceModeCode;
        return $clone;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function withCurrency(Currency $currency): self
    {
        $clone = clone $this;
        $clone->currency = $currency;
        return $clone;
    }

    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    public function withDelivery(Delivery $delivery): self
    {
        $clone = clone $this;
        $clone->delivery = $delivery;
        return $clone;
    }

    public function getRows(): ?RowCollection
    {
        return $this->rows;
    }

    public function withRows(?RowCollection $rows): self
    {
        $clone = clone $this;
        $clone->rows = $rows;
        return $clone;
    }

    public function getTotal(): ?Total
    {
        return $this->total;
    }

    public function withTotal(?Total $total): self
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
