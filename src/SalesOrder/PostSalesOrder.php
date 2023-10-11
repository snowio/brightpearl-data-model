<?php

namespace SnowIO\BrightpearlDataModel\SalesOrder;

use SnowIO\BrightpearlDataModel\Order\Billing;
use SnowIO\BrightpearlDataModel\Order\Currency;
use SnowIO\BrightpearlDataModel\Order\Customer;
use SnowIO\BrightpearlDataModel\Order\Delivery;
use SnowIO\BrightpearlDataModel\Order\Row;
use SnowIO\BrightpearlDataModel\Order\RowCollection;

class PostSalesOrder
{
    /** @var Customer|null */
    private $customer;
    /** @var Billing|null */
    private $billing;
    /** @var string|null $ref */
    private $ref;
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
    /** @var string|null $externalRef */
    private $externalRef;
    /** @var int|null $installedIntegrationInstanceId */
    private $installedIntegrationInstanceId;
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

    public static function create(): self
    {
        return new self();
    }

    public static function fromJson(array $json): self
    {
        $result = new self();

        $customer = is_array($json['customer']) ? $json['customer'] : [];
        $billing = is_array($json['billing']) ? $json['billing'] : [];
        $currency = is_array($json['currency']) ? $json['currency'] : [];
        $delivery = is_array($json['delivery']) ? $json['delivery'] : [];
        $rows = is_array($json['rows']) ? $json['rows'] : [];

        $result->customer = Customer::fromJson($customer);
        $result->billing = Billing::fromJson($billing);
        $result->ref = is_string($json['ref']) ? $json['ref'] : null;
        $result->taxDate = is_string($json['taxDate']) ? $json['taxDate'] : null;
        $result->parentId = is_numeric($json['parentId']) ? (int)$json['parentId'] : null;
        $result->statusId = is_numeric($json['statusId']) ? (int)$json['statusId'] : null;
        $result->warehouseId = is_numeric($json['warehouseId']) ? (int)$json['warehouseId'] : null;
        $result->staffOwnerId = is_numeric($json['staffOwnerId']) ? (int)$json['staffOwnerId'] : null;
        $result->projectId = is_numeric($json['projectId']) ? (int)$json['projectId'] : null;
        $result->channelId = is_numeric($json['channelId']) ? (int)$json['channelId'] : null;
        $result->externalRef = is_string($json['externalRef']) ? $json['externalRef'] : null;
        $result->leadSourceId = is_numeric($json['leadSourceId']) ? (int)$json['leadSourceId'] : null;
        $result->teamId = is_numeric($json['teamId']) ? (int)$json['teamId'] : null;
        $result->priceListId = is_numeric($json['priceListId']) ? (int)$json['priceListId'] : null;
        $result->priceModeCode = is_string($json['priceModeCode']) ? $json['priceModeCode'] : null;
        $result->currency = Currency::fromJson($currency);
        $result->delivery = Delivery::fromJson($delivery);
        $result->rows = RowCollection::fromJson($rows);

        return $result;
    }

    public function toJson(): array
    {
        $customer = is_null($this->getCustomer()) ? [] : $this->getCustomer()->toJson();
        $billing = is_null($this->getBilling()) ? [] : $this->getBilling()->toJson();
        $currency = is_null($this->getCurrency()) ? [] : $this->getCurrency()->toJson();
        $delivery = is_null($this->getDelivery()) ? [] : $this->getDelivery()->toJson();
        $rows = is_null($this->getRows()) ? [] : $this->getRows()->toJson();

        return [
            'customer' => $customer,
            'billing' => $billing,
            'ref' => $this->getRef(),
            'taxDate' => $this->getTaxDate(),
            'parentId' => $this->getParentId(),
            'statusId' => $this->getStatusId(),
            'warehouseId' => $this->getWarehouseId(),
            'staffOwnerId' => $this->getStaffOwnerId(),
            'projectId' => $this->getProjectId(),
            'channelId' => $this->getChannelId(),
            'externalRef' => $this->getExternalRef(),
            'installedIntegrationInstanceId' => $this->getInstalledIntegrationInstanceId(),
            'leadSourceId' => $this->getLeadSourceId(),
            'teamId' => $this->getTeamId(),
            'priceListId' => $this->getPriceListId(),
            'priceModeCode' => $this->getPriceModeCode(),
            'currency' => $currency,
            'delivery' => $delivery,
            'rows' => $rows
        ];
    }

    public function equals(GetSalesOrder $orderToCompare): bool
    {
        if (!is_null($this->getCustomer())
            && !is_null($orderToCompare->getCustomer())
            && !$this->getCustomer()->equals($orderToCompare->getCustomer())) {
            return false;
        }
        if (!is_null($this->getBilling())
            && !is_null($orderToCompare->getBilling())
            && !$this->getBilling()->equals($orderToCompare->getBilling())) {
            return false;
        }
        if (!is_null($this->getCurrency())
            && !is_null($orderToCompare->getCurrency())
            && !$this->getCurrency()->equals($orderToCompare->getCurrency())) {
            return false;
        }
        if (!is_null($this->getDelivery())
            && !is_null($orderToCompare->getDelivery())
            && !$this->getDelivery()->equals($orderToCompare->getDelivery())) {
            return false;
        }

        $rows = $this->getRows() instanceof RowCollection
            ? iterator_to_array($this->getRows()) : [];
        $rowsToCompare = $orderToCompare->getRows() instanceof RowCollection
            ? iterator_to_array($orderToCompare->getRows()) : [];

        $getRowsCount = count($rows);
        if ($getRowsCount !== count($rowsToCompare)) {
            return false;
        }

        for ($i = 0; $i < $getRowsCount; $i++) {
            if (!$rows[$i] instanceof Row) {
                return false;
            }
            if (!$rowsToCompare[$i] instanceof Row) {
                return false;
            }
            if (!$rows[$i]->equals($rowsToCompare[$i])) {
                return false;
            }
        }

        if ($this->getRef() !== $orderToCompare->getRef()) {
            return false;
        }
        if ($this->getTaxDate() !== $orderToCompare->getTaxDate()) {
            return false;
        }
        if ($this->getParentId() !== $orderToCompare->getParentId()) {
            return false;
        }
        if ($this->getStatusId() !== $orderToCompare->getStatusId()) {
            return false;
        }
        if ($this->getWarehouseId() !== $orderToCompare->getWarehouseId()) {
            return false;
        }
        if ($this->getStaffOwnerId() !== $orderToCompare->getStaffOwnerId()) {
            return false;
        }
        if ($this->getProjectId() !== $orderToCompare->getProjectId()) {
            return false;
        }
        if ($this->getChannelId() !== $orderToCompare->getChannelId()) {
            return false;
        }
        if ($this->getExternalRef() !== $orderToCompare->getExternalRef()) {
            return false;
        }
        if ($this->getInstalledIntegrationInstanceId() !== $orderToCompare->getInstalledIntegrationInstanceId()) {
            return false;
        }
        if ($this->getLeadSourceId() !== $orderToCompare->getLeadSourceId()) {
            return false;
        }
        if ($this->getTeamId() !== $orderToCompare->getTeamId()) {
            return false;
        }
        if ($this->getPriceListId() !== $orderToCompare->getPriceListId()) {
            return false;
        }
        return $this->getPriceModeCode() === $orderToCompare->getPriceModeCode();
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

    public function getRows(): ?RowCollection
    {
        return $this->rows;
    }

    public function withRows(?RowCollection $rows): GetSalesOrder
    {
        $clone = clone $this;
        $clone->rows = $rows;
        return $clone;
    }
}
