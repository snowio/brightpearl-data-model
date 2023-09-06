<?php

namespace SnowIO\BrightpearlDataModel\Product;

class Variation
{
    /** @var int|null $optionId */
    private $optionId;
    /** @var string|null $optionName */
    private $optionName;
    /** @var int|null $optionValueId */
    private $optionValueId;
    /** @var string|null $optionValue */
    private $optionValue;

    /**
     * @return self
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array<string, mixed> $json
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->optionId = is_numeric($json['optionId']) ? (int)$json['optionId'] : null;
        $result->optionName = is_string($json['optionName']) ? $json['optionName'] : null;
        $result->optionValueId = is_numeric($json['optionValueId']) ? (int)$json['optionValueId'] : null;
        $result->optionValue = is_string($json['optionValue']) ? $json['optionValue'] : null;

        return $result;
    }

    /**
     * @return array<string, mixed>
     */
    public function toJson(): array
    {
        return [
            'optionId' => $this->getOptionId(),
            'optionName' => $this->getOptionName(),
            'optionValueId' => $this->getOptionValueId(),
            'optionValue' => $this->getOptionValue()
        ];
    }

    /**
     * @return int|null
     */
    public function getOptionId(): ?int
    {
        return $this->optionId;
    }

    /**
     * @param int $optionId
     * @return Variation
     */
    public function withOptionId(int $optionId): Variation
    {
        $clone = clone $this;
        $clone->optionId = $optionId;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getOptionName(): ?string
    {
        return $this->optionName;
    }

    /**
     * @param string $optionName
     * @return Variation
     */
    public function withOptionName(string $optionName): Variation
    {
        $clone = clone $this;
        $clone->optionName = $optionName;
        return $clone;
    }

    /**
     * @return int|null
     */
    public function getOptionValueId(): ?int
    {
        return $this->optionValueId;
    }

    /**
     * @param int $optionValueId
     * @return Variation
     */
    public function withOptionValueId(int $optionValueId): Variation
    {
        $clone = clone $this;
        $clone->optionValueId = $optionValueId;
        return $clone;
    }

    /**
     * @return string|null
     */
    public function getOptionValue(): ?string
    {
        return $this->optionValue;
    }

    /**
     * @param string $optionValue
     * @return Variation
     */
    public function withOptionValue(string $optionValue): Variation
    {
        $clone = clone $this;
        $clone->optionValue = $optionValue;
        return $clone;
    }
}
