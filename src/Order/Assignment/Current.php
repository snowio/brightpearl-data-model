<?php

namespace SnowIO\BrightpearlDataModel\Order\Assignment;

use SnowIO\BrightpearlDataModel\Api\ModelInterface;

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
     * @return ModelInterface
     */
    public static function create(): ModelInterface
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     * @return self
     */
    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->channelId = is_int($json['channelId']) ? $json['channelId'] : null;
        $result->leadSourceId = is_int($json['leadSourceId']) ? $json['leadSourceId'] : null;
        $result->projectId = is_int($json['projectId']) ? $json['projectId'] : null;
        $result->staffOwnerContactId = is_int($json['staffOwnerContactId']) ? $json['staffOwnerContactId'] : null;
        $result->teamId = is_int($json['teamId']) ? $json['teamId'] : null;
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
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

    /**
     * @param ModelInterface $currentToCompare
     * @return bool
     */
    public function equals(ModelInterface $currentToCompare): bool
    {
        if (!$currentToCompare instanceof Current) {
            return false;
        }
        if ($this->getChannelId() !== $currentToCompare->getChannelId()) {
            return false;
        }
        if ($this->getLeadSourceId() !== $currentToCompare->getLeadSourceId()) {
            return false;
        }
        if ($this->getProjectId() !== $currentToCompare->getProjectId()) {
            return false;
        }
        if ($this->getStaffOwnerContactId() !== $currentToCompare->getStaffOwnerContactId()) {
            return false;
        }
        return $this->getTeamId() === $currentToCompare->getTeamId();
    }

    /**
     * @return int|null
     */
    public function getChannelId(): ?int
    {
        return $this->channelId;
    }

    /**
     * @param int|null $channelId
     * @return $this
     */
    public function withChannelId(?int $channelId): ModelInterface
    {
        $clone = clone $this;
        $clone->channelId = $channelId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getLeadSourceId(): ?int
    {
        return $this->leadSourceId;
    }

    /**
     * @param int|null $leadSourceId
     * @return $this
     */
    public function withLeadSourceId(?int $leadSourceId): ModelInterface
    {
        $clone = clone $this;
        $clone->leadSourceId = $leadSourceId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    /**
     * @param int|null $projectId
     * @return $this
     */
    public function withProjectIdd(?int $projectId): ModelInterface
    {
        $clone = clone $this;
        $clone->projectId = $projectId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getStaffOwnerContactId(): ?int
    {
        return $this->staffOwnerContactId;
    }

    /**
     * @param int|null $staffOwnerContactId
     * @return $this
     */
    public function withStaffOwnerContactId(?int $staffOwnerContactId): ModelInterface
    {
        $clone = clone $this;
        $clone->staffOwnerContactId = $staffOwnerContactId;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    /**
     * @param int|null $teamId
     * @return $this
     */
    public function withTeamId(?int $teamId): ModelInterface
    {
        $clone = clone $this;
        $clone->teamId = $teamId;
        return $clone;
    }
}
