<?php

namespace SnowIO\BrightpearlDataModel\Product\SalesChannel;

class Category
{
    /** @var string $categoryCode */
    private $categoryCode;

    /**
     * @param array $json
     * @return static
     */
    public static function fromJson(array $json): self
    {
        $result = new self();
        $result->categoryCode = $json['categoryCode'];
        return $result;
    }

    /**
     * @return array
     */
    public function toJson(): array
    {
        $json = [];
        $json['categoryCode'] = $this->categoryCode;
        return $json;
    }

    /**
     * @return string
     */
    public function getCategoryCode(): string
    {
        return $this->categoryCode;
    }

    /**
     * @param string $categoryCode
     * @return Categories
     */
    public function withCategoryCode(string $categoryCode): Categories
    {
        $clone = clone $this;
        $clone->categoryCode = $categoryCode;
        return $clone;
    }
}
