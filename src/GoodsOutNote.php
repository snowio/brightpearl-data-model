<?php

namespace SnowIO\BrightpearlDataModel;

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
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->orderId = $json['orderId'] ?? null;
        $result->warehouseId = $json['warehouseId'] ?? null;
        $result->externalRef = $json['externalRef'] ?? null;
        $result->transfer = $json['transfer'] ?? null;
        $result->priority = $json['priority'] ?? null;
        $result->status = Status::fromJson($json['status'] ?? []);
        $result->shipping = Shipping::fromJson($json['shipping'] ?? []);
        $result->releaseDate = $json['releaseDate'] ?? null;
        $result->createdOn = $json['createdOn'] ?? null;
        $result->createdBy = $json['createdBy'] ?? null;
        $result->orderRows = OrderRowCollection::fromJson($json['orderRows'] ?? []);
        $result->sequence = $json['sequence'] ?? null;
        $result->events = EventCollection::fromJson($json['events'] ?? []);
        $result->labelUri = $json['labelUri'] ?? null;
        $result->lastEventVersion = $json['lastEventVersion'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'orderId' => $this->getOrderId(),
            'warehouseId' => $this->getWarehouseId(),
            'externalRef' => $this->getExternalRef(),
            'transfer' => $this->isTransfer(),
            'priority' => $this->isPriority(),
            'status' => $this->getStatus() ? $this->getStatus()->toJson() : [],
            'shipping' => $this->getShipping() ? $this->getShipping()->toJson() : [],
            'releaseDate' => $this->getReleaseDate(),
            'createdOn' => $this->getCreatedOn(),
            'createdBy' => $this->getCreatedBy(),
            'orderRows' => $this->getOrderRows() ? $this->getOrderRows()->toJson() : [],
            'sequence' => $this->getSequence(),
            'events' => $this->getEvents() ? $this->getEvents()->toJson() : [],
            'labelUri' => $this->getLabelUri(),
            'lastEventVersion' => $this->getLastEventVersion()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof GoodsOutNote &&
            $this->orderId === $other->orderId &&
            $this->warehouseId === $other->warehouseId &&
            $this->externalRef === $other->externalRef &&
            $this->transfer === $other->transfer &&
            $this->priority === $other->priority &&
            ($this->status && $this->status->equals($other->status)) &&
            ($this->shipping && $this->shipping->equals($other->shipping)) &&
            $this->releaseDate === $other->releaseDate &&
            $this->createdOn === $other->createdOn &&
            $this->createdBy === $other->createdBy &&
            ($this->orderRows && $this->orderRows->equals($other->orderRows)) &&
            $this->sequence === $other->sequence &&
            ($this->events && $this->events->equals($other->events)) &&
            $this->labelUri === $other->labelUri &&
            $this->lastEventVersion === $other->lastEventVersion;
    }

    public function withOrderId(?int $orderId): GoodsOutNote
    {
        $clone = clone $this;
        $clone->orderId = $orderId;
        return $clone;
    }

    public function withWarehouseId(?int $warehouseId): GoodsOutNote
    {
        $clone = clone $this;
        $clone->warehouseId = $warehouseId;
        return $clone;
    }

    public function withExternalRef(?string $externalRef): GoodsOutNote
    {
        $clone = clone $this;
        $clone->externalRef = $externalRef;
        return $clone;
    }

    public function withTransfer(bool $transfer): GoodsOutNote
    {
        $clone = clone $this;
        $clone->transfer = $transfer;
        return $clone;
    }

    public function withPriority(bool $priority): GoodsOutNote
    {
        $clone = clone $this;
        $clone->priority = $priority;
        return $clone;
    }

    public function withStatus(Status $status): GoodsOutNote
    {
        $clone = clone $this;
        $clone->status = $status;
        return $clone;
    }

    public function withShipping(Shipping $shipping): GoodsOutNote
    {
        $clone = clone $this;
        $clone->shipping = $shipping;
        return $clone;
    }

    public function withReleaseDate(?string $releaseDate): GoodsOutNote
    {
        $clone = clone $this;
        $clone->releaseDate = $releaseDate;
        return $clone;
    }

    public function withCreatedOn(?string $createdOn): GoodsOutNote
    {
        $clone = clone $this;
        $clone->createdOn = $createdOn;
        return $clone;
    }

    public function withCreatedBy(?int $createdBy): GoodsOutNote
    {
        $clone = clone $this;
        $clone->createdBy = $createdBy;
        return $clone;
    }

    public function withOrderRows(OrderRowCollection $orderRows): GoodsOutNote
    {
        $clone = clone $this;
        $clone->orderRows = $orderRows;
        return $clone;
    }

    public function withSequence(?int $sequence): GoodsOutNote
    {
        $clone = clone $this;
        $clone->sequence = $sequence;
        return $clone;
    }

    public function withEvents(EventCollection $events): GoodsOutNote
    {
        $clone = clone $this;
        $clone->events = $events;
        return $clone;
    }

    public function withLabelUri(?string $labelUri): GoodsOutNote
    {
        $clone = clone $this;
        $clone->labelUri = $labelUri;
        return $clone;
    }

    public function withLastEventVersion(?int $lastEventVersion): GoodsOutNote
    {
        $clone = clone $this;
        $clone->lastEventVersion = $lastEventVersion;
        return $clone;
    }

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    public function getExternalRef(): ?string
    {
        return $this->externalRef;
    }

    public function isTransfer(): ?bool
    {
        return $this->transfer;
    }

    public function isPriority(): ?bool
    {
        return $this->priority;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function getShipping(): ?Shipping
    {
        return $this->shipping;
    }

    public function getReleaseDate(): ?string
    {
        return $this->releaseDate;
    }

    public function getCreatedOn(): ?string
    {
        return $this->createdOn;
    }

    public function getCreatedBy(): ?int
    {
        return $this->createdBy;
    }

    public function getOrderRows(): ?OrderRowCollection
    {
        return $this->orderRows;
    }

    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    public function getEvents(): ?EventCollection
    {
        return $this->events;
    }

    public function getLabelUri(): ?string
    {
        return $this->labelUri;
    }

    public function getLastEventVersion(): ?int
    {
        return $this->lastEventVersion;
    }
}
