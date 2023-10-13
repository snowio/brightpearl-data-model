<?php

namespace SnowIO\BrightpearlDataModel\Product;

use SnowIO\BrightpearlDataModel\ModelInterface;

class Variation implements ModelInterface
{
    /** @var int|null $optionId */
    private $optionId;
    /** @var string|null $optionName */
    private $optionName;
    /** @var int|null $optionValueId */
    private $optionValueId;
    /** @var string|null $optionValue */
    private $optionValue;

    public static function create(): ModelInterface
    {
        return new self();
    }

    public static function fromJson(array $json): ModelInterface
    {
        $result = new self();
        $result->optionId = $json['optionId'] ?? null;
        $result->optionName = $json['optionName'] ?? null;
        $result->optionValueId = $json['optionValueId'] ?? null;
        $result->optionValue = $json['optionValue'] ?? null;
        return $result;
    }

    public function toJson(): array
    {
        return [
            'optionId' => $this->getOptionId(),
            'optionName' => $this->getOptionName(),
            'optionValueId' => $this->getOptionValueId(),
            'optionValue' => $this->getOptionValue()
        ];
    }

    public function equals(ModelInterface $other): bool
    {
        return $other instanceof Variation &&
            $this->optionId === $other->optionId &&
            $this->optionName === $other->optionName &&
            $this->optionValueId === $other->optionValueId &&
            $this->optionValue === $other->optionValue;
    }

    public function getOptionId(): ?int
    {
        return $this->optionId;
    }

    public function withOptionId(int $optionId): Variation
    {
        $clone = clone $this;
        $clone->optionId = $optionId;
        return $clone;
    }

    public function getOptionName(): ?string
    {
        return $this->optionName;
    }

    public function withOptionName(string $optionName): Variation
    {
        $clone = clone $this;
        $clone->optionName = $optionName;
        return $clone;
    }

    public function getOptionValueId(): ?int
    {
        return $this->optionValueId;
    }

    public function withOptionValueId(int $optionValueId): Variation
    {
        $clone = clone $this;
        $clone->optionValueId = $optionValueId;
        return $clone;
    }

    public function getOptionValue(): ?string
    {
        return $this->optionValue;
    }

    public function withOptionValue(string $optionValue): Variation
    {
        $clone = clone $this;
        $clone->optionValue = $optionValue;
        return $clone;
    }
}
