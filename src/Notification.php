<?php

namespace SnowIO\BrightpearlDataModel;

class Notification
{
    /** @var string|null $entityId */
    private $entityId;
    /** @var string|null $timestamp */
    private $timestamp;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $eventJson
     */
    public static function fromJson(array $eventJson): self
    {
        $result = new self();
        $result->entityId = is_string($eventJson['id']) ? $eventJson['id'] : null;
        $result->timestamp = is_string($eventJson['raisedOn']) ? $eventJson['raisedOn'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'id' => $this->getEntityId(),
            'raisedOn' => $this->getTimestamp()
        ];
    }

    /**
     * @param Notification $notificationToCompare
     * @return bool
     */
    public function equals(Notification $notificationToCompare): bool
    {
        if ($this->getEntityId() !== $notificationToCompare->getEntityId()) {
            return false;
        }

        return $this->getTimestamp() === $notificationToCompare->getTimestamp();
    }

    /**
     * @return string|null
     */
    public function getEntityId(): ?string
    {
        return $this->entityId;
    }

    /**
     * @param string|null $entityId
     * @return Notification
     */
    public function withEntityId(?string $entityId): Notification
    {
        $clone = clone $this;
        $clone->entityId = $entityId;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }

    /**
     * @param string|null $timestamp
     * @return Notification
     */
    public function withTimestamp(?string $timestamp): Notification
    {
        $clone = clone $this;
        $clone->timestamp = $timestamp;
        return $clone;
    }
}
