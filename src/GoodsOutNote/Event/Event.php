<?php

namespace SnowIO\BrightpearlDataModel\GoodsOutNote\Event;

class Event
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
    public static function create(): self
    {
        return new self();
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $json = [];
        $json['occurred'] = $this->getOccurred();
        $json['eventOwnerId'] = $this->getEventOwnerId();
        $json['eventCode'] = $this->getEventCode();
        return $json;
    }

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->occurred = is_string($json['occurred']) ? $json['occurred'] : null;
        $result->eventOwnerId = is_int($json['eventOwnerId']) ? $json['eventOwnerId'] : null;
        $result->eventCode = is_string($json['eventCode']) ? $json['eventCode'] : null;
        return $result;
    }

    public function equals(Event $eventToCompare): bool
    {

        if ($this->getOccurred() !== $eventToCompare->getOccurred()) {
            return false;
        }

        if ($this->getEventOwnerId() !== $eventToCompare->getEventOwnerId()) {
            return false;
        }

        return $this->getEventCode() === $eventToCompare->getEventCode();
    }

    /**
     * @param string|null $occurred
     * @return Event
     */
    public function withOccurred(?string $occurred): Event
    {
        $clone = clone $this;
        $clone->occurred = $occurred;
        return $clone;
    }

    /**
     * @param int|null $eventOwnerId
     * @return Event
     */
    public function withEventOwnerId(?int $eventOwnerId): Event
    {
        $clone = clone $this;
        $clone->eventOwnerId = $eventOwnerId;
        return $clone;
    }

    /**
     * @param string|null $eventCode
     * @return Event
     */
    public function withEventCode(?string $eventCode): Event
    {
        $clone = clone $this;
        $clone->eventCode = $eventCode;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getOccurred(): ?string
    {
        return $this->occurred;
    }

    /**
     * @return int|null
     */
    public function getEventOwnerId(): ?int
    {
        return $this->eventOwnerId;
    }

    /**
     * @return string|null
     */
    public function getEventCode(): ?string
    {
        return $this->eventCode;
    }
}