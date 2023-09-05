<?php

namespace SnowIO\BrightpearlDataModel\Product;

class Variations
{
    /** @var int $sku */
    private $optionId;
    /** @var string $optionName */
    private $optionName;
    /** @var int $optionValueId */
    private $optionValueId;
    /** @var string $optionValue */
    private $optionValue;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();

        $result->optionId = $json['optionId'];
        $result->optionName = $json['optionName'];
        $result->optionValueId = $json['optionValueId'];
        $result->optionValue = $json['optionValue'];

        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];

        $json['optionId'] = $this->optionId;
        $json['optionName'] = $this->optionName;
        $json['optionValueId'] = $this->optionValueId;
        $json['optionValue'] = $this->optionValue;

        return $json;
    }

    /**
     * @return int
     */
    public function getOptionId(): int
    {
        return $this->optionId;
    }

    /**
     * @param int $optionId
     * @return Variations
     */
    public function withOptionId(int $optionId): Variations
    {
        $clone = clone $this;
        $clone->optionId = $optionId;
        return $clone;
    }

    /**
     * @return string
     */
    public function getOptionName(): string
    {
        return $this->optionName;
    }

    /**
     * @param string $optionName
     * @return Variations
     */
    public function withOptionName(string $optionName): Variations
    {
        $clone = clone $this;
        $clone->optionName = $optionName;
        return $clone;
    }

    /**
     * @return int
     */
    public function getOptionValueId(): int
    {
        return $this->optionValueId;
    }

    /**
     * @param int $optionValueId
     * @return Variations
     */
    public function withOptionValueId(int $optionValueId): Variations
    {
        $clone = clone $this;
        $clone->optionValueId = $optionValueId;
        return $clone;
    }

    /**
     * @return string
     */
    public function getOptionValue(): string
    {
        return $this->optionValue;
    }

    /**
     * @param string $optionValue
     * @return Variations
     */
    public function withOptionValue(string $optionValue): Variations
    {
        $clone = clone $this;
        $clone->optionValue = $optionValue;
        return $clone;
    }
}
