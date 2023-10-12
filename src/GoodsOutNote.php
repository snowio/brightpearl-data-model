<?php

namespace SnowIO\BrightpearlDataModel;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;
use SnowIO\BrightpearlDataModel\GoodsOutNote\EventCollection;
use SnowIO\BrightpearlDataModel\GoodsOutNote\OrderRowCollection;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Shipping;
use SnowIO\BrightpearlDataModel\GoodsOutNote\Status;

class GoodsOutNote implements ModelInterface
{
    /** @var int|null $orderId */
    private $orderId;

    /** @var int|null $warehouseId */
    private $warehouseId;

    /** @var string|null $externalRef */
    private $externalRef;

    /** @var bool|null $transfer */
    private $transfer;

    /** @var bool|null $priority */
    private $priority;

    /** @var Status|null $status */
    private $status;

    /** @var Shipping|null $shipping */
    private $shipping;

    /** @var string|null $releaseDate */
    private $releaseDate;

    /** @var string|null $createdOn */
    private $createdOn;

    /** @var int|null $createdBy */
    private $createdBy;

    /** @var OrderRowCollection|null $orderRows */
    private $orderRows;

    /** @var int|null $sequence */
    private $sequence;

    /** @var EventCollection|null $events */
    private $events;

    /** @var string|null $labelUri */
    private $labelUri;

    /** @var int|null $lastEventVersion */
    private $lastEventVersion;


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
        $result = new self();
        $result->orderId = is_int($json['orderId']) ? $json['orderId'] : null;
        $result->warehouseId = is_int($json['warehouseId']) ? $json['warehouseId'] : null;
        $result->externalRef = is_string($json['externalRef']) ? $json['externalRef'] : null;
        $result->transfer = is_bool($json['transfer']) && $json['transfer'];
        $result->priority = is_bool($json['priority']) && $json['priority'];
        $result->status = Status::fromJson(is_array($json['status']) ? $json['status'] : []);
        $result->shipping = Shipping::fromJson(is_array($json['shipping']) ? $json['shipping'] : []);
        $result->releaseDate = is_string($json['releaseDate']) ? $json['releaseDate'] : null;
        $result->createdOn = is_string($json['createdOn']) ? $json['createdOn'] : null;
        $result->createdBy = is_int($json['createdBy']) ? $json['createdBy'] : null;
        $result->orderRows = OrderRowCollection::fromJson(is_array($json['orderRows']) ? $json['orderRows'] : []);
        $result->sequence = is_int($json['sequence']) ? $json['sequence'] : null;
        $result->events = EventCollection::fromJson(is_array($json['events']) ? $json['events'] : []);
        $result->labelUri = is_string($json['labelUri']) ? $json['labelUri'] : null;
        $result->lastEventVersion = is_int($json['lastEventVersion']) ? $json['lastEventVersion'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $status = is_null($this->getStatus()) ? [] : $this->getStatus()->toJson();
        $shipping = is_null($this->getShipping()) ? [] : $this->getShipping()->toJson();
        $orderRows = is_null($this->getOrderRows()) ? [] : $this->getOrderRows()->toJson();
        $events = is_null($this->getEvents()) ? [] : $this->getEvents()->toJson();

        return [
            'orderId' => $this->getOrderId(),
            'warehouseId' => $this->getWarehouseId(),
            'externalRef' => $this->getExternalRef(),
            'transfer' => $this->isTransfer(),
            'priority' => $this->isPriority(),
            'status' => $status,
            'shipping' => $shipping,
            'releaseDate' => $this->getReleaseDate(),
            'createdOn' => $this->getCreatedOn(),
            'createdBy' => $this->getCreatedBy(),
            'orderRows' => $orderRows,
            'sequence' => $this->getSequence(),
            'events' => $events,
            'labelUri' => $this->getLabelUri(),
            'lastEventVersion' => $this->getLastEventVersion()
        ];
    }

    /**
     * @param ModelInterface $goodsOutNoteToCompare
     * @return bool
     */
    public function equals(ModelInterface $goodsOutNoteToCompare): bool
    {
        return $this->toJson() === $goodsOutNoteToCompare->toJson();
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
     * @return bool|null
     */
    public function isTransfer(): ?bool
    {
        return $this->transfer;
    }

    /**
     * @return bool|null
     */
    public function isPriority(): ?bool
    {
        return $this->priority;
    }

    /**
     * @return Status|null
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * @return Shipping|null
     */
    public function getShipping(): ?Shipping
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
     * @return OrderRowCollection|null
     */
    public function getOrderRows(): ?OrderRowCollection
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
     * @return EventCollection|null
     */
    public function getEvents(): ?EventCollection
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
