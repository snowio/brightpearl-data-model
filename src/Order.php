<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\Order\Billing;
use SnowIO\BrightpearlDataModel\Order\Currency;
use SnowIO\BrightpearlDataModel\Order\Customer;
use SnowIO\BrightpearlDataModel\Order\Delivery;
use SnowIO\BrightpearlDataModel\Order\Row;

class Order
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
    /** @var Row[] $rows */
    private $rows = [];

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return self
     */
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
        $result->installedIntegrationInstanceId = is_numeric($json['installedIntegrationInstanceId']) ? (int)$json['installedIntegrationInstanceId'] : null;
        $result->leadSourceId = is_numeric($json['leadSourceId']) ? (int)$json['leadSourceId'] : null;
        $result->teamId = is_numeric($json['teamId']) ? (int)$json['teamId'] : null;
        $result->priceListId = is_numeric($json['priceListId']) ? (int)$json['priceListId'] : null;
        $result->priceModeCode = is_string($json['priceModeCode']) ? $json['priceModeCode'] : null;
        $result->currency = Currency::fromJson($currency);
        $result->delivery = Delivery::fromJson($delivery);
        $result->rows = array_map(function (array $json): Row {
            return Row::fromJson($json);
        }, $rows);

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $customer = is_null($this->getCustomer()) ? [] : $this->getCustomer()->toJson();
        $billing = is_null($this->getBilling()) ? [] : $this->getBilling()->toJson();
        $currency = is_null($this->getCurrency()) ? [] : $this->getCurrency()->toJson();
        $delivery = is_null($this->getDelivery()) ? [] : $this->getDelivery()->toJson();
        $rows = array_map(static function (Row $row): array {
            return $row->toJson();
        }, $this->getRows());

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

    /**
     * @param Order $orderToCompare
     * @return bool
     */
    public function equals(Order $orderToCompare): bool
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

        $getRowsCount = count($this->getRows());
        if ($getRowsCount !== count($orderToCompare->getRows())) {
            return false;
        }

        for ($i = 0; $i < $getRowsCount; $i++) {
            if (!$this->getRows()[$i]->equals($orderToCompare->getRows()[$i])) {
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

    /**
     * @return Customer|null
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return Order
     */
    public function withCustomer(Customer $customer): Order
    {
        $clone = clone $this;
        $clone->customer = $customer;
        return $clone;
    }

    /**
     * @return Billing|null
     */
    public function getBilling(): ?Billing
    {
        return $this->billing;
    }

    /**
     * @param Billing $billing
     * @return Order
     */
    public function withBilling(Billing $billing): Order
    {
        $clone = clone $this;
        $clone->billing = $billing;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getRef(): ?string
    {
        return $this->ref;
    }

    /**
     * @param string|null $ref
     * @return Order
     */
    public function withRef(?string $ref): Order
    {
        $clone = clone $this;
        $clone->ref = $ref;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTaxDate(): ?string
    {
        return $this->taxDate;
    }

    /**
     * @param string|null $taxDate
     * @return Order
     */
    public function withTaxDate(?string $taxDate): Order
    {
        $clone = clone $this;
        $clone->taxDate = $taxDate;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @param int|null $parentId
     * @return Order
     */
    public function withParentId(?int $parentId): Order
    {
        $clone = clone $this;
        $clone->parentId = $parentId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    /**
     * @param int|null $statusId
     * @return Order
     */
    public function withStatusId(?int $statusId): Order
    {
        $clone = clone $this;
        $clone->statusId = $statusId;
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

    /**
     * @return int|null
     */
    public function getStaffOwnerId(): ?int
    {
        return $this->staffOwnerId;
    }

    /**
     * @param int|null $staffOwnerId
     * @return Order
     */
    public function withStaffOwnerId(?int $staffOwnerId): Order
    {
        $clone = clone $this;
        $clone->staffOwnerId = $staffOwnerId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    /**
     * @param int|null $projectId
     * @return Order
     */
    public function withProjectId(?int $projectId): Order
    {
        $clone = clone $this;
        $clone->projectId = $projectId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    /**
     * @param int|null $channelId
     * @return Order
     */
    public function withChannelId(?int $channelId): Order
    {
        $clone = clone $this;
        $clone->channelId = $channelId;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    /**
     * @param string|null $externalRef
     * @return Order
     */
    public function withExternalRef(?string $externalRef): Order
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getInstalledIntegrationInstanceId(): ?int
    {
        return $this->installedIntegrationInstanceId;
    }

    /**
     * @param int|null $installedIntegrationInstanceId
     * @return Order
     */
    public function withInstalledIntegrationInstanceId(?int $installedIntegrationInstanceId): Order
    {
        $clone = clone $this;
        $clone->installedIntegrationInstanceId = $installedIntegrationInstanceId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getLeadSourceId(): ?int
    {
        return $this->leadSourceId;
    }

    /**
     * @param int|null $leadSourceId
     * @return Order
     */
    public function withLeadSourceId(?int $leadSourceId): Order
    {
        $clone = clone $this;
        $clone->leadSourceId = $leadSourceId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    /**
     * @param int|null $teamId
     * @return Order
     */
    public function withTeamId(?int $teamId): Order
    {
        $clone = clone $this;
        $clone->teamId = $teamId;
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
     * @return Currency|null
     */
    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency $currency
     * @return Order
     */
    public function withCurrency(Currency $currency): Order
    {
        $clone = clone $this;
        $clone->currency = $currency;
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
     * @param Delivery $delivery
     * @return Order
     */
    public function withDelivery(Delivery $delivery): Order
    {
        $clone = clone $this;
        $clone->delivery = $delivery;
        return $clone;
    }

    /**
     * @return Row[]
     */
    public function getRows(): array
    {
        return $this->rows;
    }

    /**
     * @param Row[] $rows
     * @return Order
     */
    public function withRows(array $rows): Order
    {
        $clone = clone $this;
        $clone->rows = $rows;
        return $clone;
    }
}
