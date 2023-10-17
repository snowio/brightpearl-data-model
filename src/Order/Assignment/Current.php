<?php

namespace SnowIO\BrightpearlDataModel\Order\Assignment;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Current implements ModelInterface
{
    /** @var int|null $channelId */
    private $channelId;
    /** @var int|null $leadSourceId */
    private $leadSourceId;
    /** @var int|null $projectId */
    private $projectId;
    /** @var int|null $staffOwnerContactId */
    private $staffOwnerContactId;
    /** @var int|null $teamId */
    private $teamId;

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
        $result->channelId = $json['channelId'] ?? null;
        $result->leadSourceId =  $json['leadSourceId'] ?? null;
        $result->projectId =  $json['projectId'] ?? null;
        $result->staffOwnerContactId =  $json['staffOwnerContactId'] ?? null;
        $result->teamId =  $json['teamId'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'channelId' => $this->getChannelId(),
            'leadSourceId' => $this->getLeadSourceId(),
            'projectId' => $this->getProjectId(),
            'staffOwnerContactId' => $this->getStaffOwnerContactId(),
            'teamId' => $this->getTeamId(),
        ];
    }

    public function hasData()
    {
        return count(array_filter($this->toJson()));
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Current&&
            $this->channelId === $other->channelId &&
            $this->leadSourceId === $other->leadSourceId &&
            $this->projectId === $other->projectId &&
            $this->staffOwnerContactId === $other->staffOwnerContactId &&
            $this->teamId === $other->teamId;
    }

    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    public function withChannelId(?int $channelId): ModelInterface
    {
        $clone = clone $this;
        $clone->channelId = $channelId;
        return $clone;
    }

    public function getLeadSourceId(): ?int
    {
        return $this->leadSourceId;
    }

    public function withLeadSourceId(?int $leadSourceId): ModelInterface
    {
        $clone = clone $this;
        $clone->leadSourceId = $leadSourceId;
        return $clone;
    }

    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    public function withProjectId(?int $projectId): ModelInterface
    {
        $clone = clone $this;
        $clone->projectId = $projectId;
        return $clone;
    }

    public function getStaffOwnerContactId(): ?int
    {
        return $this->staffOwnerContactId;
    }

    public function withStaffOwnerContactId(?int $staffOwnerContactId): ModelInterface
    {
        $clone = clone $this;
        $clone->staffOwnerContactId = $staffOwnerContactId;
        return $clone;
    }

    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    public function withTeamId(?int $teamId): ModelInterface
    {
        $clone = clone $this;
        $clone->teamId = $teamId;
        return $clone;
    }
}
