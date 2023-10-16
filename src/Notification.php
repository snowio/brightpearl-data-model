<?php

namespace SnowIO\BrightpearlDataModel;

class Notification implements ModelInterface
{
    /** @var string|null $entityId */
    private $entityId;
    /** @var string|null $timestamp */
    private $timestamp;

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
        $result->entityId =$json['id'] ?? null;
        $result->timestamp = $json['raisedOn'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->getEntityId(),
            'raisedOn' => $this->getTimestamp()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Notification &&
            $this->entityId === $other->entityId &&
            $this->timestamp === $other->timestamp;
    }

    public function getEntityId(): ?string
    {
        return $this->entityId;
    }

    public function withEntityId(?string $entityId): Notification
    {
        $clone = clone $this;
        $clone->entityId = $entityId;
        return $clone;
    }

    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }

    public function withTimestamp(?string $timestamp): Notification
    {
        $clone = clone $this;
        $clone->timestamp = $timestamp;
        return $clone;
    }
}
