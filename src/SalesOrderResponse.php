<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;
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

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): ModelInterface
    {
        $customer = is_array($json['customer']) ? $json['customer'] : [];
        $billing = is_array($json['billing']) ? $json['billing'] : [];
        $delivery = is_array($json['delivery']) ? $json['delivery'] : [];
        $currency = is_array($json['currency']) ? $json['currency'] : [];
        $rows = is_array($json['rows']) ? $json['rows'] : [];
        $total = is_array($json['total']) ? $json['total'] : [];
        $invoice = is_array($json['invoice']) ? $json['invoice'] : [];

        $result = new self();
        $result->id = is_int($json['id']) ? $json['id'] : null;
        $result->customer = Customer::fromJson($customer);
        $result->billing = Billing::fromJson($billing);
        $result->ref = is_string($json['ref']) ? $json['ref'] : null;
        $result->placedOn = is_string($json['placedOn']) ? $json['placedOn'] : null;
        $result->parentId = is_int($json['parentId']) ? $json['parentId'] : null;
        $result->statusId = is_int($json['statusId']) ? $json['statusId'] : null;
        $result->warehouseId = is_int($json['warehouseId']) ? $json['warehouseId'] : null;
        $result->channelId = is_int($json['channelId']) ? $json['channelId'] : null;
        $result->staffOwnerId = is_int($json['staffOwnerId']) ? $json['staffOwnerId'] : null;
        $result->projectId = is_int($json['projectId']) ? $json['projectId'] : null;
        $result->leadSourceId = is_int($json['leadSourceId']) ? $json['leadSourceId'] : null;
        $result->teamId = is_int($json['teamId']) ? $json['teamId'] : null;
        $result->priceListId = is_int($json['priceListId']) ? $json['priceListId'] : null;
        $result->priceModeCode = is_string($json['priceModeCode']) ? $json['priceModeCode'] : null;
        $result->delivery = Delivery::fromJson($delivery);
        $result->currency = Currency::fromJson($currency);
        $result->rows = RowCollection::fromJson($rows);
        $result->total = Total::fromJson($total);
        $result->stockStatusCode = is_string($json['stockStatusCode']) ? $json['stockStatusCode'] : null;
        $result->createdBy = is_int($json['createdBy']) ? $json['createdBy'] : null;
        $result->createdOn = is_string($json['createdOn']) ? $json['createdOn'] : null;
        $result->updatedOn = is_string($json['updatedOn']) ? $json['updatedOn'] : null;
        $result->invoice = Invoice::fromJson($invoice);
        $result->orderWeighting = is_int($json['orderWeighting']) ? $json['orderWeighting'] : null;
        $result->costPriceListId = is_int($json['costPriceListId']) ? $json['costPriceListId'] : null;
        $result->customerId = is_int($json['customerId']) ? $json['customerId'] : null;
        $result->taxDate = is_string($json['taxDate']) ? $json['taxDate'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $customer = is_null($this->getCustomer()) ? [] : $this->getCustomer()->toJson();
        $billing = is_null($this->getBilling()) ? [] : $this->getBilling()->toJson();
        $rows = is_null($this->getRows()) ? [] : $this->getRows()->toJson();
        $total = is_null($this->getTotal()) ? [] : $this->getTotal()->toJson();
        $invoice = is_null($this->getInvoice()) ? [] : $this->getInvoice()->toJson();
        $delivery = is_null($this->getDelivery()) ? [] : $this->getDelivery()->toJson();
        $currency = is_null($this->getCurrency()) ? [] : $this->getCurrency()->toJson();

        return [
            'id' => $this->getId(),
            'customer' => $customer,
            'billing' => $billing,
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
            'delivery' => $delivery,
            'currency' => $currency,
            'rows' => $rows,
            'total' => $total,
            'stockStatusCode' => $this->getStockStatusCode(),
            'createdBy' => $this->getCreatedBy(),
            'createdOn' => $this->getCreatedOn(),
            'updatedOn' => $this->getUpdatedOn(),
            'invoice' => $invoice,
            'orderWeighting' => $this->getOrderWeighting(),
            'costPriceListId' => $this->getCostPriceListId(),
            'customerId' => $this->getCustomerId(),
            'taxDate' => $this->getTaxDate(),
        ];
    }

    /**
     * @param ModelInterface $salesOrderResponseToCompare
     * @return bool
     */
    public function equals(ModelInterface $salesOrderResponseToCompare): bool
    {
        return $this->toJson() === $salesOrderResponseToCompare->toJson();
    }

    /**
     * @param int|null $id
     * @return SalesOrderResponse
     */
    public function withId(?int $id): SalesOrderResponse
    {
        $result = clone $this;
        $result->id = $id;
        return $result;
    }

    /**
     * @param Customer|null $customer
     * @return SalesOrderResponse
     */
    public function withCustomer(?Customer $customer): SalesOrderResponse
    {
        $result = clone $this;
        $result->customer = $customer;
        return $result;
    }

    /**
     * @param Billing|null $billing
     * @return SalesOrderResponse
     */
    public function withBilling(?Billing $billing): SalesOrderResponse
    {
        $result = clone $this;
        $result->billing = $billing;
        return $result;
    }

    /**
     * @param string|null $ref
     * @return SalesOrderResponse
     */
    public function withRef(?string $ref): SalesOrderResponse
    {
        $result = clone $this;
        $result->ref = $ref;
        return $result;
    }

    /**
     * @param string|null $placedOn
     * @return SalesOrderResponse
     */
    public function withPlacedOn(?string $placedOn): SalesOrderResponse
    {
        $result = clone $this;
        $result->placedOn = $placedOn;
        return $result;
    }

    /**
     * @param string|null $taxDate
     * @return SalesOrderResponse
     */
    public function withTaxDate(?string $taxDate): SalesOrderResponse
    {
        $result = clone $this;
        $result->taxDate = $taxDate;
        return $result;
    }

    /**
     * @param int|null $parentId
     * @return SalesOrderResponse
     */
    public function withParentId(?int $parentId): SalesOrderResponse
    {
        $result = clone $this;
        $result->parentId = $parentId;
        return $result;
    }

    /**
     * @param int|null $statusId
     * @return SalesOrderResponse
     */
    public function withStatusId(?int $statusId): SalesOrderResponse
    {
        $result = clone $this;
        $result->statusId = $statusId;
        return $result;
    }

    /**
     * @param int|null $warehouseId
     * @return SalesOrderResponse
     */
    public function withWarehouseId(?int $warehouseId): SalesOrderResponse
    {
        $result = clone $this;
        $result->warehouseId = $warehouseId;
        return $result;
    }

    /**
     * @param int|null $channelId
     * @return SalesOrderResponse
     */
    public function withChannelId(?int $channelId): SalesOrderResponse
    {
        $result = clone $this;
        $result->channelId = $channelId;
        return $result;
    }

    /**
     * @param int|null $staffOwnerId
     * @return SalesOrderResponse
     */
    public function withStaffOwnerId(?int $staffOwnerId): SalesOrderResponse
    {
        $result = clone $this;
        $result->staffOwnerId = $staffOwnerId;
        return $result;
    }

    /**
     * @param int|null $projectId
     * @return SalesOrderResponse
     */
    public function withProjectId(?int $projectId): SalesOrderResponse
    {
        $result = clone $this;
        $result->projectId = $projectId;
        return $result;
    }

    /**
     * @param int|null $leadSourceId
     * @return SalesOrderResponse
     */
    public function withLeadSourceId(?int $leadSourceId): SalesOrderResponse
    {
        $result = clone $this;
        $result->leadSourceId = $leadSourceId;
        return $result;
    }

    /**
     * @param int|null $teamId
     * @return SalesOrderResponse
     */
    public function withTeamId(?int $teamId): SalesOrderResponse
    {
        $result = clone $this;
        $result->teamId = $teamId;
        return $result;
    }

    /**
     * @param int|null $priceListId
     * @return SalesOrderResponse
     */
    public function withPriceListId(?int $priceListId): SalesOrderResponse
    {
        $result = clone $this;
        $result->priceListId = $priceListId;
        return $result;
    }

    /**
     * @param string|null $priceModeCode
     * @return SalesOrderResponse
     */
    public function withPriceModeCode(?string $priceModeCode): SalesOrderResponse
    {
        $result = clone $this;
        $result->priceModeCode = $priceModeCode;
        return $result;
    }

    /**
     * @param Currency|null $currency
     * @return SalesOrderResponse
     */
    public function withCurrency(?Currency $currency): SalesOrderResponse
    {
        $result = clone $this;
        $result->currency = $currency;
        return $result;
    }

    /**
     * @param Delivery|null $delivery
     * @return SalesOrderResponse
     */
    public function withDelivery(?Delivery $delivery): SalesOrderResponse
    {
        $result = clone $this;
        $result->delivery = $delivery;
        return $result;
    }

    /**
     * @param RowCollection|null $rows
     * @return SalesOrderResponse
     */
    public function withRows(?RowCollection $rows): SalesOrderResponse
    {
        $result = clone $this;
        $result->rows = $rows;
        return $result;
    }

    /**
     * @param Total|null $total
     * @return SalesOrderResponse
     */
    public function withTotal(?Total $total): SalesOrderResponse
    {
        $result = clone $this;
        $result->total = $total;
        return $result;
    }

    /**
     * @param string|null $stockStatusCode
     * @return SalesOrderResponse
     */
    public function withStockStatusCode(?string $stockStatusCode): SalesOrderResponse
    {
        $result = clone $this;
        $result->stockStatusCode = $stockStatusCode;
        return $result;
    }

    /**
     * @param int|null $createdBy
     * @return SalesOrderResponse
     */
    public function withCreatedBy(?int $createdBy): SalesOrderResponse
    {
        $result = clone $this;
        $result->createdBy = $createdBy;
        return $result;
    }

    /**
     * @param string|null $createdOn
     * @return SalesOrderResponse
     */
    public function withCreatedOn(?string $createdOn): SalesOrderResponse
    {
        $result = clone $this;
        $result->createdOn = $createdOn;
        return $result;
    }

    /**
     * @param string|null $updatedOn
     * @return SalesOrderResponse
     */
    public function withUpdatedOn(?string $updatedOn): SalesOrderResponse
    {
        $result = clone $this;
        $result->updatedOn = $updatedOn;
        return $result;
    }

    /**
     * @param Invoice|null $invoice
     * @return SalesOrderResponse
     */
    public function withInvoice(?Invoice $invoice): SalesOrderResponse
    {
        $result = clone $this;
        $result->invoice = $invoice;
        return $result;
    }

    /**
     * @param int|null $orderWeighting
     * @return SalesOrderResponse
     */
    public function withOrderWeighting(?int $orderWeighting): SalesOrderResponse
    {
        $result = clone $this;
        $result->orderWeighting = $orderWeighting;
        return $result;
    }

    /**
     * @param int|null $costPriceListId
     * @return SalesOrderResponse
     */
    public function withCostPriceListId(?int $costPriceListId): SalesOrderResponse
    {
        $result = clone $this;
        $result->costPriceListId = $costPriceListId;
        return $result;
    }

    /**
     * @param int|null $customerId
     * @return SalesOrderResponse
     */
    public function withCustomerId(?int $customerId): SalesOrderResponse
    {
        $result = clone $this;
        $result->customerId = $customerId;
        return $result;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * @return Billing|null
     */
    public function getBilling(): ?Billing
    {
        return $this->billing;
    }

    /**
     * @return string|null
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @return string|null
     */
    public function getPlacedOn(): ?string
    {
        return $this->placedOn;
    }

    /**
     * @return string|null
     */
    public function getTaxDate(): ?string
    {
        return $this->taxDate;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @return int|null
     */
    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    /**
     * @return int|null
     */
    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    /**
     * @return int|null
     */
    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    /**
     * @return int|null
     */
    public function getStaffOwnerId(): ?int
    {
        return $this->staffOwnerId;
    }

    /**
     * @return int|null
     */
    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    /**
     * @return int|null
     */
    public function getLeadSourceId(): ?int
    {
        return $this->leadSourceId;
    }

    /**
     * @return int|null
     */
    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    /**
     * @return int|null
     */
    public function getPriceListId(): ?int
    {
        return $this->priceListId;
    }

    /**
     * @return string|null
     */
    public function getPriceModeCode(): ?string
    {
        return $this->priceModeCode;
    }

    /**
     * @return Currency|null
     */
    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    /**
     * @return Delivery|null
     */
    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    /**
     * @return RowCollection|null
     */
    public function getRows(): ?RowCollection
    {
        return $this->rows;
    }

    /**
     * @return Total|null
     */
    public function getTotal(): ?Total
    {
        return $this->total;
    }

    /**
     * @return string|null
     */
    public function getStockStatusCode(): ?string
    {
        return $this->stockStatusCode;
    }

    /**
     * @return int|null
     */
    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    /**
     * @return string|null
     */
    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    /**
     * @return string|null
     */
    public function getUpdatedOn(): ?string
    {
        return $this->updatedOn;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @return int|null
     */
    public function getOrderWeighting(): ?int
    {
        return $this->orderWeighting;
    }

    /**
     * @return int|null
     */
    public function getCostPriceListId(): ?int
    {
        return $this->costPriceListId;
    }

    /**
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }
}
