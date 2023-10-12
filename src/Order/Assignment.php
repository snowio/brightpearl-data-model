<?php

namespace SnowIO\BrightpearlDataModel\Order;

use SnowIO\BrightpearlDataModel\ModelInterface;
use SnowIO\BrightpearlDataModel\Order\Assignment\Current;

class Assignment implements ModelInterface
{
    /** @var Current|null $current */
    private $current;

    /**
     * @return self
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
        $current = is_array($json['current']) ? $json['current'] : [];
        $result = new self();
        $result->current = Current::fromJson($current);
        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        $current = is_null($this->getCurrent()) ? [] : $this->getCurrent()->toJson();
        return [
            'current' => $current
        ];
    }

    /**
     * @param ModelInterface $assignmentToCompare
     * @return bool
     */
    public function equals(ModelInterface $assignmentToCompare): bool
    {
        if (!$assignmentToCompare instanceof Assignment) {
            return false;
        }
        if ($this->getCurrent() === null) {
            return false;
        }
        if (!$assignmentToCompare->getCurrent() instanceof Current) {
            return false;
        }

        return $this->getCurrent()->equals($assignmentToCompare->getCurrent());
    }

    /**
     * @return Current|null
     */
    public function getCurrent(): ?Current
    {
        return $this->current;
    }

    /**
     * @param Current|null $current
     * @return self
     */
    public function withCurrent(?Current $current): self
    {
        $clone = clone $this;
        $clone->current = $current;
        return $clone;
    }
}
