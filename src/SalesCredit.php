<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\SalesCredit\Currency;
use SnowIO\BrightpearlDataModel\SalesCredit\Delivery;
use SnowIO\BrightpearlDataModel\SalesCredit\RowCollection;

class SalesCredit implements ModelInterface
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
    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->customerId = $json['customerId'] ?? null;
        $result->ref = $json['ref'] ?? null;
        $result->placedOn = $json['placedOn'] ?? null;
        $result->taxDate = $json['taxDate'] ?? null;
        $result->parentId = $json['parentId'] ?? null;
        $result->statusId = $json['statusId'] ?? null;
        $result->warehouseId = $json['warehouseId'] ?? null;
        $result->staffOwnerId = $json['staffOwnerId'] ?? null;
        $result->projectId = $json['projectId'] ?? null;
        $result->channelId = $json['channelId'] ?? null;
        $result->externalRef = $json['externalRef'] ?? null;
        $result->installedIntegrationInstanceId = $json['installedIntegrationInstanceId'] ?? null;
        $result->leadSourceId = $json['leadSourceId'] ?? null;
        $result->teamId = $json['teamId'] ?? null;
        $result->priceListId = $json['priceListId'] ?? null;
        $result->priceModeCode = $json['priceModeCode'] ?? null;
        $result->currency = Currency::fromJson($json['currency'] ?? []);
        $result->delivery = Delivery::fromJson($json['delivery'] ?? []);
        $result->rows = RowCollection::fromJson($json['rows'] ?? []);
        return $result;
    }

    public function toJson(): array
    {
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
            'currency' => $this->getCurrency()->toJson(),
            'delivery' => $this->getDelivery()->toJson(),
            'rows' => $this->getRows()->toJson()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof SalesCredit &&
            $this->customerId === $other->customerId &&
            $this->ref === $other->ref &&
            $this->placedOn === $other->placedOn &&
            $this->taxDate === $other->taxDate &&
            $this->parentId === $other->parentId &&
            $this->statusId === $other->statusId &&
            $this->warehouseId === $other->warehouseId &&
            $this->staffOwnerId === $other->staffOwnerId &&
            $this->projectId === $other->projectId &&
            $this->channelId === $other->channelId &&
            $this->externalRef === $other->externalRef &&
            $this->installedIntegrationInstanceId === $other->installedIntegrationInstanceId &&
            $this->leadSourceId === $other->leadSourceId &&
            $this->teamId === $other->teamId &&
            $this->priceListId === $other->priceListId &&
            $this->priceModeCode === $other->priceModeCode &&
            $this->currency->equals($other->currency) &&
            $this->delivery->equals($other->delivery) &&
            $this->rows->equals($other->rows);
    }

    public function getRows(): ?RowCollection
    {
        return $this->rows;
    }

    public function withCustomerId(?int $customerId): SalesCredit
    {
        $result = clone $this;
        $result->customerId = $customerId;
        return $result;
    }

    public function withRef(?string $ref): SalesCredit
    {
        $result = clone $this;
        $result->ref = $ref;
        return $result;
    }

    public function withPlacedOn(?string $placedOn): SalesCredit
    {
        $result = clone $this;
        $result->placedOn = $placedOn;
        return $result;
    }

    public function withTaxDate(?string $taxDate): SalesCredit
    {
        $result = clone $this;
        $result->taxDate = $taxDate;
        return $result;
    }

    public function withParentId(?int $parentId): SalesCredit
    {
        $result = clone $this;
        $result->parentId = $parentId;
        return $result;
    }

    public function withStatusId(?int $statusId): SalesCredit
    {
        $result = clone $this;
        $result->statusId = $statusId;
        return $result;
    }

    public function withWarehouseId(?int $warehouseId): SalesCredit
    {
        $result = clone $this;
        $result->warehouseId = $warehouseId;
        return $result;
    }

    public function withStaffOwnerId(?int $staffOwnerId): SalesCredit
    {
        $result = clone $this;
        $result->staffOwnerId = $staffOwnerId;
        return $result;
    }

    public function withProjectId(?int $projectId): SalesCredit
    {
        $result = clone $this;
        $result->projectId = $projectId;
        return $result;
    }

    public function withChannelId(?int $channelId): SalesCredit
    {
        $result = clone $this;
        $result->channelId = $channelId;
        return $result;
    }

    public function withExternalRef(?string $externalRef): SalesCredit
    {
        $result = clone $this;
        $result->externalRef = $externalRef;
        return $result;
    }

    public function withInstalledIntegrationInstanceId(?int $installedIntegrationInstanceId): SalesCredit
    {
        $result = clone $this;
        $result->installedIntegrationInstanceId = $installedIntegrationInstanceId;
        return $result;
    }

    public function withLeadSourceId(?int $leadSourceId): SalesCredit
    {
        $result = clone $this;
        $result->leadSourceId = $leadSourceId;
        return $result;
    }

    public function withTeamId(?int $teamId): SalesCredit
    {
        $result = clone $this;
        $result->teamId = $teamId;
        return $result;
    }

    public function withPriceListId(?int $priceListId): SalesCredit
    {
        $result = clone $this;
        $result->priceListId = $priceListId;
        return $result;
    }

    public function withPriceModeCode(?string $priceModeCode): SalesCredit
    {
        $result = clone $this;
        $result->priceModeCode = $priceModeCode;
        return $result;
    }

    public function withCurrency(?Currency $currency): SalesCredit
    {
        $result = clone $this;
        $result->currency = $currency;
        return $result;
    }

    public function withDelivery(?Delivery $delivery): SalesCredit
    {
        $result = clone $this;
        $result->delivery = $delivery;
        return $result;
    }

    public function withRows(?RowCollection $rows): SalesCredit
    {
        $result = clone $this;
        $result->rows = $rows;
        return $result;
    }

    public function getCustomerId(): ?int
    {
        return $this->customerId;
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

    public function getStaffOwnerId(): ?int
    {
        return $this->staffOwnerId;
    }

    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    public function getInstalledIntegrationInstanceId(): ?int
    {
        return $this->installedIntegrationInstanceId;
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
}
