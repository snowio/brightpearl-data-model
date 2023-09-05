<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\GoodsOutNote\EventCollection;
use SnowIO\BrightpearlDataModel\GoodsOutNote\OrderRowCollection;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Shipping;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Status;

class GoodsOutNote
{
    /** @var int|null $orderId */
    private $orderId;

    /** @var int|null $warehouseId */
    private $warehouseId;

    /** @var string|null $externalRef */
    private $externalRef;

    /** @var bool $transfer */
    private $transfer;

    /** @var bool $priority */
    private $priority;

    /** @var Status $status */
    private $status;

    /** @var Shipping $shipping */
    private $shipping;

    /** @var string|null $releaseDate */
    private $releaseDate;

    /** @var string|null $createdOn */
    private $createdOn;

    /** @var int|null $createdBy */
    private $createdBy;

    /** @var OrderRowCollection $orderRows */
    private $orderRows;

    /** @var int|null $sequence */
    private $sequence;

    /** @var EventCollection $events */
    private $events;

    /** @var string|null $labelUri */
    private $labelUri;

    /** @var int|null $lastEventVersion */
    private $lastEventVersion;


    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * todo: this
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->orderId = is_int($json['orderId']) ? $json['orderId'] : null;
        $result->warehouseId = is_int($json['warehouseId']) ? $json['warehouseId'] : null;
        $result->externalRef = is_string($json['externalRef']) ? $json['externalRef'] : null;
        $result->transfer = is_bool($json['transfer']) ?? false;
        $result->priority = is_bool($json['priority']) ?? false;
        $result->status = Status::fromJson($json['status']);
        $result->shipping = Shipping::fromJson($json['shipping']);
        $result->releaseDate = is_string($json['releaseDate']) ? $json['releaseDate'] : null;
        $result->createdOn = is_string($json['createdOn']) ? $json['createdOn'] : null;
        $result->createdBy = is_int($json['createdBy']) ? $json['createdBy'] : null;
        $result->orderRows = OrderRowCollection::fromJson($json['orderRows']);
        $result->sequence = is_int($json['sequence']) ? $json['sequence'] : null;
        $result->events = EventCollection::fromJson($json['events']);
        $result->labelUri = is_string($json['labelUri']) ? $json['labelUri'] : null;
        $result->lastEventVersion = is_int($json['lastEventVersion']) ?: null;
        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];
        $json['orderId'] = $this->getOrderId();
        $json['warehouseId'] = $this->getWarehouseId();
        $json['externalRef'] = $this->getExternalRef();
        $json['transfer'] = $this->isTransfer();
        $json['priority'] = $this->isPriority();
        $json['status'] = $this->getStatus()->toJson();
        $json['shipping'] = $this->getShipping()->toJson();
        $json['releaseDate'] = $this->getReleaseDate();
        $json['createdOn'] = $this->getCreatedOn();
        $json['createdBy'] = $this->getCreatedBy();
        $json['orderRows'] = $this->getOrderRows()->toJson();
        $json['sequence'] = $this->getSequence();
        $json['events'] = $this->getEvents()->toJson();
        $json['labelUri'] = $this->getLabelUri();
        $json['lastEventVersion'] = $this->getLastEventVersion();
        return $json;
    }


    /**
     * @param GoodsOutNote $GoodsOutNoteToCompare
     * @return bool
     * todo: this
     */
    public function equals(GoodsOutNote $GoodsOutNoteToCompare): bool
    {
        return true;
    }

    /**
     * @param int|null $orderId
     * @return GoodsOutNote
     */
    public function withOrderId(?int $orderId): GoodsOutNote
    {
        $clone = clone $this;
        $clone->orderId = $orderId;
        return $clone;
    }

    /**
     * @param int|null $warehouseId
     * @return GoodsOutNote
     */
    public function withWarehouseId(?int $warehouseId): GoodsOutNote
    {
        $clone = clone $this;
        $clone->warehouseId = $warehouseId;
        return $clone;
    }

    /**
     * @param string|null $externalRef
     * @return GoodsOutNote
     */
    public function withExternalRef(?string $externalRef): GoodsOutNote
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }

    /**
     * @param bool $transfer
     * @return GoodsOutNote
     */
    public function withTransfer(bool $transfer): GoodsOutNote
    {
        $clone = clone $this;
        $clone->transfer = $transfer;
        return $clone;
    }

    /**
     * @param bool $priority
     * @return GoodsOutNote
     */
    public function withPriority(bool $priority): GoodsOutNote
    {
        $clone = clone $this;
        $clone->priority = $priority;
        return $clone;
    }

    /**
     * @param Status $status
     * @return GoodsOutNote
     */
    public function withStatus(Status $status): GoodsOutNote
    {
        $clone = clone $this;
        $clone->status = $status;
        return $clone;
    }

    /**
     * @param Shipping $shipping
     * @return GoodsOutNote
     */
    public function withShipping(Shipping $shipping): GoodsOutNote
    {
        $clone = clone $this;
        $clone->shipping = $shipping;
        return $clone;
    }

    /**
     * @param string|null $releaseDate
     * @return GoodsOutNote
     */
    public function withReleaseDate(?string $releaseDate): GoodsOutNote
    {
        $clone = clone $this;
        $clone->releaseDate = $releaseDate;
        return $clone;
    }

    /**
     * @param string|null $createdOn
     * @return GoodsOutNote
     */
    public function withCreatedOn(?string $createdOn): GoodsOutNote
    {
        $clone = clone $this;
        $clone->createdOn = $createdOn;
        return $clone;
    }

    /**
     * @param int|null $createdBy
     * @return GoodsOutNote
     */
    public function withCreatedBy(?int $createdBy): GoodsOutNote
    {
        $clone = clone $this;
        $clone->createdBy = $createdBy;
        return $clone;
    }

    /**
     * @param OrderRowCollection $orderRows
     * @return GoodsOutNote
     */
    public function withOrderRows(OrderRowCollection $orderRows): GoodsOutNote
    {
        $clone = clone $this;
        $clone->orderRows = $orderRows;
        return $clone;
    }

    /**
     * @param int|null $sequence
     * @return GoodsOutNote
     */
    public function withSequence(?int $sequence): GoodsOutNote
    {
        $clone = clone $this;
        $clone->sequence = $sequence;
        return $clone;
    }

    /**
     * @param EventCollection $events
     * @return GoodsOutNote
     */
    public function withEvents(EventCollection $events): GoodsOutNote
    {
        $clone = clone $this;
        $clone->events = $events;
        return $clone;
    }

    /**
     * @param string|null $labelUri
     * @return GoodsOutNote
     */
    public function withLabelUri(?string $labelUri): GoodsOutNote
    {
        $clone = clone $this;
        $clone->labelUri = $labelUri;
        return $clone;
    }

    /**
     * @param int|null $lastEventVersion
     * @return GoodsOutNote
     */
    public function withLastEventVersion(?int $lastEventVersion): GoodsOutNote
    {
        $clone = clone $this;
        $clone->lastEventVersion = $lastEventVersion;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * @return int|null
     */
    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    /**
     * @return string|null
     */
    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    /**
     * @return bool
     */
    public function isTransfer(): bool
    {
        return $this->transfer;
    }

    /**
     * @return bool
     */
    public function isPriority(): bool
    {
        return $this->priority;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @return Shipping
     */
    public function getShipping(): Shipping
    {
        return $this->shipping;
    }

    /**
     * @return string|null
     */
    public function getReleaseDate(): ?string
    {
        return $this->releaseDate;
    }

    /**
     * @return string|null
     */
    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    /**
     * @return int|null
     */
    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    /**
     * @return OrderRowCollection
     */
    public function getOrderRows(): OrderRowCollection
    {
        return $this->orderRows;
    }

    /**
     * @return int|null
     */
    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    /**
     * @return EventCollection
     */
    public function getEvents(): EventCollection
    {
        return $this->events;
    }

    /**
     * @return string|null
     */
    public function getLabelUri(): ?string
    {
        return $this->labelUri;
    }

    /**
     * @return int|null
     */
    public function getLastEventVersion(): ?int
    {
        return $this->lastEventVersion;
    }
}