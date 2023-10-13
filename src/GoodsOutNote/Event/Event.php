<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote\Event;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Event implements ModelInterface
{
    /** @var string|null $occurred */
    private $occurred;
    /** @var int|null $eventOwnerId */
    private $eventOwnerId;
    /** @var string|null $eventCode */
    private $eventCode;

    /**
     * @return self
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    public function toJson(): array
    {
        return [
            'occurred' => $this->getOccurred(),
            'eventOwnerId' => $this->getEventOwnerId(),
            'eventCode' => $this->getEventCode()
        ];
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->occurred = $json['occurred'] ?? null;
        $result->eventOwnerId = $json['eventOwnerId'] ?? null;
        $result->eventCode = $json['eventCode'] ?? null;
        return $result;
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Event &&
            $this->occurred === $other->occurred &&
            $this->eventOwnerId === $other->eventOwnerId &&
            $this->eventCode === $other->eventCode;
    }

    public function withOccurred(?string $occurred): Event
    {
        $clone = clone $this;
        $clone->occurred = $occurred;
        return $clone;
    }

    public function withEventOwnerId(?int $eventOwnerId): Event
    {
        $clone = clone $this;
        $clone->eventOwnerId = $eventOwnerId;
        return $clone;
    }

    public function withEventCode(?string $eventCode): Event
    {
        $clone = clone $this;
        $clone->eventCode = $eventCode;
        return $clone;
    }

    public function getOccurred(): ?string
    {
        return $this->occurred;
    }

    public function getEventOwnerId(): ?int
    {
        return $this->eventOwnerId;
    }

    public function getEventCode(): ?string
    {
        return $this->eventCode;
    }
}
