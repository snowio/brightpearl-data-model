<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\SalesCredit\Currency;
use SnowIO\BrightpearlDataModel\SalesCredit\Delivery;
use SnowIO\BrightpearlDataModel\SalesCredit\RowCollection;

class SalesCredit
{
    /** @var int|null */
    private $customerId;
    /** @var string|null */
    private $ref;
    /** @var string|null */
    private $placedOn;
    /** @var string|null */
    private $taxDate;
    /** @var int|null */
    private $parentId;
    /** @var int|null */
    private $statusId;
    /** @var int|null */
    private $warehouseId;
    /** @var int|null */
    private $staffOwnerId;
    /** @var int|null */
    private $projectId;
    /** @var int|null */
    private $channelId;
    /** @var string|null */
    private $externalRef;
    /** @var int|null */
    private $installedIntegrationInstanceId;
    /** @var int|null */
    private $leadSourceId;
    /** @var int|null */
    private $teamId;
    /** @var int|null */
    private $priceListId;
    /** @var string|null */
    private $priceModeCode;
    /** @var Currency|null */
    private $currency;
    /** @var Delivery|null $delivery */
    private $delivery;
    /** @var RowCollection|null $rows */
    private $rows;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return SalesCredit
     */
    public static function fromJson(array $json): SalesCredit
    {
        $result = new self();
        $result->customerId = is_int($json['customerId']) ? $json['customerId'] : null;
        $result->ref = is_string($json['ref']) ? $json['ref'] : null;
        $result->placedOn = is_string($json['placedOn']) ? $json['placedOn'] : null;
        $result->taxDate = is_string($json['taxDate']) ? $json['taxDate'] : null;
        $result->parentId = is_int($json['parentId']) ? $json['parentId'] : null;
        $result->statusId = is_int($json['statusId']) ? $json['statusId'] : null;
        $result->warehouseId = is_int($json['warehouseId']) ? $json['warehouseId'] : null;
        $result->staffOwnerId = is_int($json['staffOwnerId']) ? $json['staffOwnerId'] : null;
        $result->projectId = is_int($json['projectId']) ? $json['projectId'] : null;
        $result->channelId = is_int($json['channelId']) ? $json['channelId'] : null;
        $result->externalRef = is_string($json['externalRef']) ? $json['externalRef'] : null;
        $result->installedIntegrationInstanceId = is_int($json['installedIntegrationInstanceId']) ? $json['installedIntegrationInstanceId'] : null;
        $result->leadSourceId = is_int($json['leadSourceId']) ? $json['leadSourceId'] : null;
        $result->teamId = is_int($json['teamId']) ? $json['teamId'] : null;
        $result->priceListId = is_int($json['priceListId']) ? $json['priceListId'] : null;
        $result->priceModeCode = is_string($json['priceModeCode']) ? $json['priceModeCode'] : null;
        $result->currency = Currency::fromJson(is_array($json['currency']) ? $json['currency'] : []);
        $result->delivery = Delivery::fromJson(is_array($json['delivery']) ? $json['delivery'] : []);
        $result->rows = RowCollection::fromJson(is_array($json['rows']) ? $json['rows'] : []);
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $currency = is_null($this->getCurrency()) ? [] : $this->getCurrency()->toJson();
        $rows = is_null($this->getRows()) ? [] : $this->getRows()->toJson();
        $delivery = is_null($this->getDelivery()) ? [] : $this->getDelivery()->toJson();
        return [
            'customerId' => $this->getCustomerId(),
            'ref' => $this->getRef(),
            'placedOn' => $this->getPlacedOn(),
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
     * @return RowCollection|null
     */
    public function getRows(): ?RowCollection
    {
        return $this->rows;
    }

    /**
     * @param int|null $customerId
     * @return SalesCredit
     */
    public function withCustomerId(?int $customerId): SalesCredit
    {
        $result = clone $this;
        $result->customerId = $customerId;
        return $result;
    }

    /**
     * @param string|null $ref
     * @return SalesCredit
     */
    public function withRef(?string $ref): SalesCredit
    {
        $result = clone $this;
        $result->ref = $ref;
        return $result;
    }

    /**
     * @param string|null $placedOn
     * @return SalesCredit
     */
    public function withPlacedOn(?string $placedOn): SalesCredit
    {
        $result = clone $this;
        $result->placedOn = $placedOn;
        return $result;
    }

    /**
     * @param string|null $taxDate
     * @return SalesCredit
     */
    public function withTaxDate(?string $taxDate): SalesCredit
    {
        $result = clone $this;
        $result->taxDate = $taxDate;
        return $result;
    }

    /**
     * @param int|null $parentId
     * @return SalesCredit
     */
    public function withParentId(?int $parentId): SalesCredit
    {
        $result = clone $this;
        $result->parentId = $parentId;
        return $result;
    }

    /**
     * @param int|null $statusId
     * @return SalesCredit
     */
    public function withStatusId(?int $statusId): SalesCredit
    {
        $result = clone $this;
        $result->statusId = $statusId;
        return $result;
    }

    /**
     * @param int|null $warehouseId
     * @return SalesCredit
     */
    public function withWarehouseId(?int $warehouseId): SalesCredit
    {
        $result = clone $this;
        $result->warehouseId = $warehouseId;
        return $result;
    }

    /**
     * @param int|null $staffOwnerId
     * @return SalesCredit
     */
    public function withStaffOwnerId(?int $staffOwnerId): SalesCredit
    {
        $result = clone $this;
        $result->staffOwnerId = $staffOwnerId;
        return $result;
    }

    /**
     * @param int|null $projectId
     * @return SalesCredit
     */
    public function withProjectId(?int $projectId): SalesCredit
    {
        $result = clone $this;
        $result->projectId = $projectId;
        return $result;
    }

    /**
     * @param int|null $channelId
     * @return SalesCredit
     */
    public function withChannelId(?int $channelId): SalesCredit
    {
        $result = clone $this;
        $result->channelId = $channelId;
        return $result;
    }

    /**
     * @param string|null $externalRef
     * @return SalesCredit
     */
    public function withExternalRef(?string $externalRef): SalesCredit
    {
        $result = clone $this;
        $result->externalRef = $externalRef;
        return $result;
    }

    /**
     * @param int|null $installedIntegrationInstanceId
     * @return SalesCredit
     */
    public function withInstalledIntegrationInstanceId(?int $installedIntegrationInstanceId): SalesCredit
    {
        $result = clone $this;
        $result->installedIntegrationInstanceId = $installedIntegrationInstanceId;
        return $result;
    }

    /**
     * @param int|null $leadSourceId
     * @return SalesCredit
     */
    public function withLeadSourceId(?int $leadSourceId): SalesCredit
    {
        $result = clone $this;
        $result->leadSourceId = $leadSourceId;
        return $result;
    }

    /**
     * @param int|null $teamId
     * @return SalesCredit
     */
    public function withTeamId(?int $teamId): SalesCredit
    {
        $result = clone $this;
        $result->teamId = $teamId;
        return $result;
    }

    /**
     * @param int|null $priceListId
     * @return SalesCredit
     */
    public function withPriceListId(?int $priceListId): SalesCredit
    {
        $result = clone $this;
        $result->priceListId = $priceListId;
        return $result;
    }

    /**
     * @param string|null $priceModeCode
     * @return SalesCredit
     */
    public function withPriceModeCode(?string $priceModeCode): SalesCredit
    {
        $result = clone $this;
        $result->priceModeCode = $priceModeCode;
        return $result;
    }

    /**
     * @param Currency|null $currency
     * @return SalesCredit
     */
    public function withCurrency(?Currency $currency): SalesCredit
    {
        $result = clone $this;
        $result->currency = $currency;
        return $result;
    }

    /**
     * @param Delivery|null $delivery
     * @return SalesCredit
     */
    public function withDelivery(?Delivery $delivery): SalesCredit
    {
        $result = clone $this;
        $result->delivery = $delivery;
        return $result;
    }

    /**
     * @param RowCollection|null $rows
     * @return SalesCredit
     */
    public function withRows(?RowCollection $rows): SalesCredit
    {
        $result = clone $this;
        $result->rows = $rows;
        return $result;
    }

    /**
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
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
    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    /**
     * @return string|null
     */
    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    /**
     * @return int|null
     */
    public function getInstalledIntegrationInstanceId(): ?int
    {
        return $this->installedIntegrationInstanceId;
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
}
